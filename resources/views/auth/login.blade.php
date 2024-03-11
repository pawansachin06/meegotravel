@php
    $breadcrumbs = [ ['name'=> 'Login', 'link'=> route('login')] ];
@endphp
<x-app-layout>
    <x-page-banner :$breadcrumbs title="Login" />

    <x-authentication-card>
        <div class="my-2"></div>

        <div class="mb-3">
            <x-button.google />
        </div>

        <div class="text-sm flex items-center text-center mb-4 select-none">
            <span class="grow border-b"></span>
            <span class="px-2">{{ __('or continue with email') }}</span>
            <span class="grow border-b"></span>
        </div>


        <div class="mb-6 rounded text-center border border-red-500">
            email: admin@admin.com<br>
            password: password
        </div>


        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-float.input id="email" name="email" type="email" value="{{ old('email') }}" autofocus required label="Email" placeholder="Email" class="mb-5" />
            <x-float.input id="password" name="password" type="password" value="" required label="Password" placeholder="Password" class="mb-4" />

            <div class="flex items-center justify-between mb-2">
                <label for="remember_me" class="flex gap-2 items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="select-none cursor-pointer text-sm text-gray-800">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm font-semibold focus:outline-primary-500 focus:outline-offset-2 text-primary-500" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif

            </div>
            <x-button class="w-full mb-2">{{ __('Log in') }}</x-button>
        </form>
        <div class="">
            <p>I have no account. <a href="{{ route('register') }}" class="font-semibold text-primary-500">Create an account</a></p>
        </div>
    </x-authentication-card>
</x-app-layout>
