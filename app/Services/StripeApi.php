<?php

namespace App\Services;

use Exception;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class StripeApi
{
    private $credentials = [];

    public function __construct()
    {
        $keys = ['stripe_public_key', 'stripe_secret_key'];
        $setting = Setting::whereIn('key', $keys)->pluck('value', 'key');

        $this->credentials = [
            'public_key' => @$setting['stripe_public_key'],
            'secret_key' => @$setting['stripe_secret_key'],
        ];
    }

    /**
     * Create a Stripe Payment Intent
     *
     * @param int $amount
     * @param string $description
     */
    public function createPaymentIntent($amount, $description): array
    {
        try {
            $secret_key = $this->credentials['secret_key'];
            $stripe = new \Stripe\StripeClient($secret_key);
            $intent = $stripe->paymentIntents->create([
                'amount' => $amount * 100, // paise instead of rupees, cents instead of dollar
                'currency' => 'inr',
                'description' => $description,
                'automatic_payment_methods' => ['enabled' => true],
            ]);
            return [
                'success' => true,
                'client_secret' => $intent->client_secret
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
