@props([
    'aos' => 0,
    'swiper' => 0,
    'sweetalert' => 0,
    'title' => 'Meego Travel',
    'description' => 'Meego Travel site',
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
    <div class="min-h-screen flex flex-col bg-gray-100">
        <div class="flex grow">
            <input type="checkbox" id="app-sidebar-checkbox" class="hidden" />
            <div id="app-sidebar-container" class="flex flex-col">
                <label id="app-sidebar-overlay" for="app-sidebar-checkbox" class="transition-colors"></label>
                <div id="app-sidebar" class="flex flex-col bg-white shadow-sm">
                    <div class="flex-none flex px-1 shadow-sm justify-between h-14">
                        <span class="flex px-1 leading-tight truncate flex-col justify-center select-none">
                            <p class="truncate">{{ Auth::user()->name }}</p>
                            <small class="inline-block text-gray-600 truncate">{{ Auth::user()->email }}</small>
                        </span>
                        <div class="flex gap-1">
                            <label for="app-sidebar-checkbox" title="Toggle sidebar" class="app-sidebar-close-btn lg:hidden group inline-flex items-center justify-center cursor-pointer text-gray-600 hover:text-gray-900 transition-colors">
                                <span class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-gray-300 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960"><path d="M480-424 284-228q-11 11-28 11t-28-11q-11-11-11-28t11-28l196-196-196-196q-11-11-11-28t11-28q11-11 28-11t28 11l196 196 196-196q11-11 28-11t28 11q11 11 11 28t-11 28L536-480l196 196q11 11 11 28t-11 28q-11 11-28 11t-28-11L480-424Z"/></svg>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="grow overflow-y-auto app-scrollbar border-b">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                            <span>View Website</span>
                        </a>

                        <a href="{{ route('dashboard.overview') }}" class="{{ request()->routeIs('dashboard.overview') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.index') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/></svg>
                            <span>Users</span>
                        </a>


                    </div>
                    <div class="text-center py-1">
                        <a href="https://www.example.com" target="_blank" rel="noopener noreferrer nofollow" class="text-sm leading-none">Built with MeegoTravel Team</a>
                    </div>
                </div>
            </div>
            <div id="app-content" class="flex flex-col w-full">
                @livewire('navigation-menu')
                <main class="grow">{{ $slot }}</main>
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
    @if(!empty($sweetalert))
        <script defer src="/js/lib/sweetalert2.min.js?v=11.9.0"></script>
    @endif
    <script defer src="/js/lib/toastify.min.js?v={{ config('app.version') }}"></script>
    <script defer src="/js/utils.js?v={{ config('app.version') }}"></script>
    <script defer src="/js/global.js?v={{ config('app.version') }}"></script>
</body>

</html>