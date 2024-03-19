<?php

namespace App\Services;

use Exception;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;


class PayPalApi
{
    private $apiBase = '';
    private $credentials = [];
    private $token = null;

    public function __construct()
    {
        $keys = ['paypal_client_id', 'paypal_client_secret', 'paypal_env'];
        $setting = Setting::whereIn('key', $keys)->pluck('value', 'key');

        $this->apiBase = 'https://api-m.sandbox.paypal.com';

        $this->credentials = [
            'client_id' => @$setting['paypal_client_id'],
            'client_secret' => @$setting['paypal_client_secret'],
        ];
    }


    public function postOrder($data = [])
    {
        $accessToken = $this->getAccessToken();
        $url = "{$this->apiBase}/v2/checkout/orders";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => '100'
                    ]
                ]
            ]
        ]));
        $res = curl_exec($ch);
        curl_close($ch);
        $order = json_decode($res, true);
        Log::info('PayPal Order', ['res' => $order]);
        if(!empty($order)){
            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    // Return the approve link
                    return response()->json(['url' => $link['href']]);
                }
            }
        }

        // If "approve" link is not found, return an error
        return response()->json(['error' => 'Approve link not found'], 500);
    }


    private function getAccessToken()
    {
        $client_id = $this->credentials['client_id'];
        $client_secret = $this->credentials['client_secret'];
        $auth = base64_encode($client_id . ':' . $client_secret);
        $url = "{$this->apiBase}/v1/oauth2/token";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Basic ' . $auth]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        $res = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($res, true);
        Log::info('PayPal Auth', ['res' => $data]);
        return @$data['access_token'];
    }













    private function url($action)
    {
        return rtrim($this->apiBase, '/') . '/' . ltrim($action, '/');
    }

    private function withAuth($array = [])
    {
        $array[] = "Authorization: Bearer {$this->token()}";
        return $array;
    }

    public function call($action, $data = [], $method = 'GET', $shouldCache = false)
    {
        $curl = curl_init($this->url($action));
        try {
            $result = $this->_call($curl, $data, $method, false, $shouldCache);
        } catch (Exception $e) { // refresh token and try again
            Log::info('Refresh token', ['message' => $e->getMessage()]);
            $this->token = null;
            $result = $this->_call($curl, $data, $method, true, $shouldCache);
        }
        $data = json_decode($result, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['error' => $result];
        }
        return $data;
    }

    protected function token()
    {
        if (empty($this->token)) {
            $keys = ['airalo_access_token', 'airalo_access_token_expires'];
            $setting = Setting::whereIn('key', $keys)->pluck('value', 'key');
            if (
                !empty($setting['airalo_access_token'])
                && !empty($setting['airalo_access_token_expires'])
                && $setting['airalo_access_token_expires'] > time()
            ) {
                return $setting['airalo_access_token'];
            }

            $curl = curl_init($this->url('/v1/oauth2/token'));
            $result = $this->execCurl($curl, $this->credentials, 'POST');
            $result = @json_decode($result, true);
            if (!empty($result['data']['access_token'])) {
                $this->token = $result['data']['access_token'];
                Cache::put('airalo_token', $this->token);
                $expires = (@$result['data']['expires_in']) + (time() - 86400);
                Setting::updateOrCreate(
                    ['key' => 'airalo_access_token'],
                    ['value' => $this->token, 'type' => 'SECRET',],
                );
                Setting::updateOrCreate(
                    ['key' => 'airalo_access_token_expires'],
                    ['value' => $expires, 'type' => 'SECRET',],
                );
            } else {
                error_mail('Airalo Token Credentials failed', [
                    'result' => $result,
                ]);
                return '';
            }
        }
        return $this->token;
    }

    protected function execCurl($curl, $data = [], $method = 'GET')
    {
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $info = curl_getinfo($curl);
        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        if ($method == 'GET') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            if (!empty($data)) {
                $query = http_build_query($data);
                curl_setopt($curl, CURLOPT_URL, $info['url'] . '?' . $query);
            }
        }
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if (!in_array($httpcode, [200, 201])) {
            error_mail('API CALL ERROR: ' . $info['url'], $result);
            return null;
        }
        return $result;
    }

    protected function _call(
        $curl,
        $data = [],
        $method = 'GET',
        $debug = false,
        $shouldCache = false
    ) {
        if (!$this->apiBase) {
            throw new Exception('No API base sepecified');
        }

        $info = curl_getinfo($curl);
        $query = http_build_query($data);
        $full_url = $info['url'] . '?' . $query;
        if ($shouldCache) {
            $cacheKey = 'api_cache_' . md5($full_url);

            if (Cache::has($cacheKey)) {
                Log::info('SERVING CAHCE ', [$full_url]);
                return Cache::get($cacheKey);
            }
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->withAuth([
                "Content-Type: application/json",
                "Content-Lenght: " . strlen(json_encode($data))
            ]));
        }

        if ($method == 'GET') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->withAuth());
            if ($data) {
                $query = http_build_query($data);
                curl_setopt($curl, CURLOPT_URL, $info['url'] . '?' . $query);
            }
        }

        $result = curl_exec($curl);
        $info = curl_getinfo($curl);
        if ($info['http_code'] == 401) {
            if ($debug) {
                error_mail('Airalo API connection failed', [
                    'result' => $result,
                    'info' => $info,
                ]);
                Log::error('M2 Api connection error', [
                    'result' => $result,
                    'info' => $info,
                ]);
            }
            throw new Exception('No authorization 401');
        }
        if (!$result) {
            error_mail('Connection to Airalo API failed', [
                'result' => $result,
                'info' => $info,
            ]);
            Log::error('Connection to Airalo API failed', [
                'result' => $result,
                'info' => $info,
            ]);
        }

        Log::info('API=> ' . $full_url, [$result]);
        if ($shouldCache) {
            // Cache for 60 minutes
            Cache::put($cacheKey, $result, now()->addMinutes(60));
        }
        return $result;
    }
}
