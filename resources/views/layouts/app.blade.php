@props([
    'aos' => 0,
    'swiper' => 0,
    'title' => 'Pets Connected',
    'description' => 'Pets Connected with accessories and services.',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    @if(!empty($swiper))
        <link rel="preload" as="style" href="/css/lib/swiper-bundle.min.css?v=11.0.7" />
        <link rel="stylesheet" href="/css/lib/swiper-bundle.min.css?v=11.0.7" />
    @endif

    @if(!empty($aos))
        <link rel="preload" as="style" href="/css/lib/aos.css?v=2.3.1" />
        <link rel="stylesheet" href="/css/lib/aos.css?v=2.3.1" />
    @endif

    <link rel="preload" as="style" href="/css/lib/toastify.min.css?v={{ config('app.version') }}" />
    <link rel="stylesheet" href="/css/lib/toastify.min.css?v={{ config('app.version') }}" />


    <link rel="preload" as="style" href="/css/global.css?v={{ config('app.version') }}" />
    <link rel="stylesheet" href="/css/global.css?v={{ config('app.version') }}" />

    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" />

    <script defer src="/js/base.js?v={{ config('app.version') }}"></script>
</head>

<body class="font-sans antialiased bg-gray-50">
    <x-banner />
    <x-header />
    <main class="grow">{{ $slot }}</main>
    <x-footer />
    <div class="py-12"></div>
    <div id="app-bottom-navbar" class="fixed left-0 bottom-0 right-0 border-t sm:hidden bg-white">
        <div class="flex justify-around items-center">
            <a href="" class="{{ request()->routeIs('home') ? 'text-primary-500' : 'hover:bg-primary-50 text-gray-600' }} w-3/12 inline-flex flex-col justify-center items-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-7 w-7 my-1" width="24" height="24" viewBox="0 -960 960 960">
                    <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                </svg>
                <span class="text-sm">Home</span>
            </a>
            <a href="" class="w-3/12 inline-flex flex-col justify-center items-center py-1 hover:bg-primary-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-7 w-7 my-1" width="24" height="24" viewBox="0 -960 960 960">
                    <path d="M460-280v-160h-80l120-240v160h80L460-280ZM280-40q-33 0-56.5-23.5T200-120v-720q0-33 23.5-56.5T280-920h400q33 0 56.5 23.5T760-840v720q0 33-23.5 56.5T680-40H280Zm0-120v40h400v-40H280Zm0-80h400v-480H280v480Zm0-560h400v-40H280v40Zm0 0v-40 40Zm0 640v40-40Z" />
                </svg>
                <span class="text-sm">Topups</span>
            </a>
            <a href="" class="w-3/12 inline-flex flex-col justify-center items-center py-1 hover:bg-primary-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-7 w-7 my-1" width="24" height="24" viewBox="0 -960 960 960">
                    <path d="M280-200h80v-80h-80v80Zm0-160h80v-160h-80v160Zm160 160h80v-160h-80v160Zm0-240h80v-80h-80v80Zm160 240h80v-80h-80v80Zm0-160h80v-160h-80v160ZM240-80q-33 0-56.5-23.5T160-160v-480l240-240h320q33 0 56.5 23.5T800-800v640q0 33-23.5 56.5T720-80H240Zm0-80h480v-640H434L240-606v446Zm0 0h480-480Z" />
                </svg>
                <span class="text-sm">My eSIMs</span>
            </a>
            <a href="" class="w-3/12 inline-flex flex-col justify-center items-center py-1 hover:bg-primary-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-7 w-7 my-1" width="24" height="24" viewBox="0 -960 960 960"><path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/></svg>
                <span class="text-sm">Profile</span>
            </a>
        </div>
    </div>

    <input type="checkbox" id="app-sidenav-checkbox" class="hidden" />
    <div id="app-sidenav-container" class="flex flex-col">
        <label id="app-sidenav-overlay" for="app-sidenav-checkbox" class="transition-colors"></label>
        <div id="app-sidenav" class="flex flex-col bg-white shadow-sm">
            <div class="flex-none flex px-2 h-14 shadow justify-between">
                <span class="flex px-1 leading-tight truncate flex-col justify-center select-none">
                    @auth
                    <p class="truncate"> {{ auth()->user()->name }}</p>
                    <small class="inline-block text-gray-600 truncate">{{ auth()->user()->email }}</small>
                    @endauth
                </span>
                <div class="flex gap-1">
                    <label for="app-sidenav-checkbox" title="Toggle sidebar" class="app-sidenav-close-btn group inline-flex items-center justify-center cursor-pointer text-gray-600 hover:text-gray-900 transition-colors">
                        <span class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-primary-50 border border-primary-200 group-hover:bg-primary-100 group-hover:text-primary-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960">
                                <path d="M480-424 284-228q-11 11-28 11t-28-11q-11-11-11-28t11-28l196-196-196-196q-11-11-11-28t11-28q11-11 28-11t28 11l196 196 196-196q11-11 28-11t28 11q11 11 11 28t-11 28L536-480l196 196q11 11 11 28t-11 28q-11 11-28 11t-28-11L480-424Z" />
                            </svg>
                        </span>
                    </label>
                </div>
            </div>
            <div class="grow overflow-y-auto app-scrollbar border-b">
                <x-sidebar.menu-item href="{{ route('home') }}" :active="request()->routeIs('home')">New eSIMs</x-sidebar.menu-item>
                <x-sidebar.menu-item href="{{ route('topup') }}" :active="request()->routeIs('topup')">Topup</x-sidebar.menu-item>
                <x-sidebar.menu-item href="{{ route('check-usage') }}" :active="request()->routeIs('check-usage')">Check Usage</x-sidebar.menu-item>
                <x-sidebar.menu-item href="{{ route('articles.front.index') }}" :active="request()->routeIs('articles.front.index')">Blog</x-sidebar.menu-item>
                <x-sidebar.menu-item href="{{ route('troubleshoot') }}" :active="request()->routeIs('troubleshoot')">Help & Support</x-sidebar.menu-item>
                <x-sidebar.menu-item href="{{ route('faqs') }}" :active="request()->routeIs('faqs')">FAQs</x-sidebar.menu-item>
            </div>
            <div class="text-center py-1">
                <a href="{{ config('app.url') }}" target="_blank" rel="noopener noreferrer nofollow" class="text-sm leading-none">Built with {{ config('app.name') }} Team</a>
            </div>
        </div>
    </div>

    @stack('modals')
    @livewireScripts

    @if(!empty($swiper))
        <script defer src="/js/lib/swiper-bundle.min.js?v=11.0.7"></script>
    @endif
    @if(!empty($aos))
        <script defer src="/js/lib/aos.js?v=2.3.1"></script>
    @endif
    <script defer src="/js/lib/toastify.min.js?v={{ config('app.version') }}"></script>
    <script defer src="/js/utils.js?v={{ config('app.version') }}"></script>
    <script defer src="/js/global.js?v={{ config('app.version') }}"></script>
</body>

</html>