@php
    $breadcrumbs = [ ['name'=> 'Register', 'link'=> route('register')] ];
@endphp
<x-app-layout>
    <x-page-banner :$breadcrumbs title="Register" />

    <x-authentication-card>
        <div class="my-2"></div>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" autocomplete="off">
            @csrf

            <x-float.input id="email" name="email" type="email" value="" autofocus required label="Email" placeholder="Email" class="mb-5" />
            <x-float.input id="name" name="name" type="text" value="" required label="Name" placeholder="Name" class="mb-5" />
            <x-float.input id="referral_code" name="referral_code" type="text" value="" label="Referral Code" placeholder="Referral Code" class="mb-5" />
            <x-float.input id="password" name="password" type="password" value="" required label="Password" placeholder="Password" class="mb-5" />
            <x-float.input id="password_confirmation" name="password_confirmation" type="password" value="" required label="Confirm Password" placeholder="Confirm Password" class="mb-3" />

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <x-button class="w-full mb-2">{{ __('Register') }}</x-button>
        </form>
        <div class="">
            <p>Already have an account. <a href="{{ route('login') }}" class="font-semibold text-primary-500">Log In</a></p>
        </div>
    </x-authentication-card>
</x-app-layout>
