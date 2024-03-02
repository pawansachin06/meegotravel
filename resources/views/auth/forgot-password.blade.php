@php
    $breadcrumbs = [ ['name'=> 'Forgot Password', 'link'=> route('password.request')] ];
@endphp
<x-app-layout>
    <x-page-banner :$breadcrumbs title="Forgot Password" />
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <x-float.input id="email" name="email" type="email" value="" autofocus required :value="old('email')" label="Email" placeholder="Email" class="mb-3" />

            <x-button class="w-full mb-2">{{ __('Email Password Reset Link') }}</x-button>
        </form>
        <div class="">
            <p>I remember password. <a href="{{ route('login') }}" class="font-semibold text-primary-500">Back to login</a></p>
        </div>
    </x-authentication-card>
</x-app-layout>
