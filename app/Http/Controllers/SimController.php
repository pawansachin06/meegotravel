<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Sim;
use App\Services\AiraloApi;
use App\Services\PayPalApi;
use Illuminate\Http\Request;
use App\Services\StripeApi;
use Exception;

class SimController extends Controller
{
    protected $airaloApi;
    protected $payPalApi;
    protected $stripeApi;

    public function __construct(
        AiraloApi $airaloApi, PayPalApi $payPalApi, StripeApi $stripeApi,
    ) {
        $this->airaloApi = $airaloApi;
        $this->payPalApi = $payPalApi;
        $this->stripeApi = $stripeApi;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $items = Sim::withCount('labTests')
        //             ->paginate(10)->withQueryString();
        // return view('sims.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req, $countrySlug)
    {
        $countryCode = $this->airaloApi->getCountryCodeFromSlug($countrySlug);
        if(empty($countryCode)) abort(404);

        $res = $this->airaloApi->getPackages([
            'filter' => [
                'country' => $countryCode,
                'limit' => 1,
            ],
        ]);
        $group = $res['data'][0] ?? [];

        if( !empty($req->dev) ){
            dd($group);
        }

        return view('sims.show', [
            'group'=> $group,
            'countrySlug' => $countrySlug,
            'title' => $group['title'],
            'image' => $group['image'],
            'country_code' => $group['country_code'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sim $sim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sim $sim)
    {
        //
    }

    public function checkout(Request $req, $countrySlug, $packageId)
    {
        $type = $countrySlug == 'world' ? 'global' : 'local';
        $countryCode = $this->airaloApi->getCountryCodeFromSlug($countrySlug);

        $res = $this->airaloApi->getPackages([
            'filter' => ['type' => $type, 'country' => $countryCode],
            'limit' => $type == 'local' ? 1 : 100,
        ]);

        $package = [];
        $operator = [];
        if(empty($res['data'])) abort(500, 'Connection Timeout, try again');

        foreach ($res['data'] as $value) {
            if($value['slug'] == $countrySlug){
                if(!empty($value['operators'])){
                    foreach ($value['operators'] as $_operator) {
                        if(!empty($_operator['packages'])){
                            foreach ($_operator['packages'] as $_package) {
                                if($_package['id'] == $packageId){
                                    $operator = $_operator;
                                    $package = $_package;
                                }
                            }
                        }
                    }
                }
            }
        }

        $compatibleDevices = $this->airaloApi->getCompatibleDevices();

        if( !empty($req->dev) ){
            dd($package, $operator, $compatibleDevices);
        }

        if(empty($operator) || empty($package)) abort(404);

        return view('sims.checkout', [
            'operator' => $operator,
            'package' => $package,
            'countrySlug' => $countrySlug,
            'packageId' => $packageId,
            'compatibleDevices' => $compatibleDevices,
        ]);
    }

    public function pay(Request $req, $client_secret)
    {
        $keys = ['stripe_public_key'];
        $setting = Setting::whereIn('key', $keys)->pluck('value', 'key');
        return view('sims.pay', [
            'client_secret' => $client_secret,
            'stripe_key' => @$setting['stripe_public_key'],
        ]);
    }

    public function order(Request $req, $countrySlug, $packageId)
    {
        $currentUser = $req->user();
        if( empty($currentUser) ){
            session([
                'login_redirect_url' => route('sims.checkout', [
                    'countrySlug' => $countrySlug, 'packageId' => $packageId,
                ])
            ]);
            return response()->json([
                'success'=> false,
                'redirect' => route('login'),
                'message'=> 'Please login to continue'
            ]);
        }

        $res = $this->stripeApi->createPaymentIntent(5, 'Just test order');
        if( !empty($res['success']) && !empty($res['client_secret']) ){
            $redirect = route('sims.pay', ['client_secret' => $res['client_secret']]);
            return response()->json([
                'success'=> true,
                'redirect'=> $redirect,
                'message'=> 'Loading...',
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message'=> !empty($res['message']) ? $res['message'] : 'Internal server error',
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sim $sim)
    {
        //
    }
}
