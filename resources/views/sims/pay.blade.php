<x-app-layout stripe="1">
    <div class="container px-3 py-5">
        <form id="stripe-payment-form" class="max-w-lg mx-auto my-5 py-5">
            <div id="stripe-payment-element" class="mb-4">
                <!--Stripe.js injects the Payment Element-->
            </div>
            <x-button id="submit" type="submit" data-js="submit-btn" class="w-full">
                <span data-js="submit-btn-text">Pay Now</span>
            </x-button>
        </form>
    </div>
    <x-slot name="scripts">
        <script type="text/javascript">
            var clientSecret = "{{ $client_secret }}";
            var stripeKey = "{{ $stripe_key }}";
        </script>
    </x-slot>
</x-app-layout>