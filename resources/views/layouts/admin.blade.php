@props([
    'aos' => 0,
    'swiper' => 0,
    'sweetalert' => 0,
    'tinymce' => 0,
    'ckeditor' => 0,
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

    @if(!empty($ckeditor))
        <link rel="preload" as="style" href="/css/ckeditor.admin.css?v={{ config('app.version') }}" />
        <link rel="stylesheet" href="/css/ckeditor.admin.css?v={{ config('app.version') }}" />
    @endif

    <link rel="preload" as="style" href="/css/lib/toastify.min.css?v={{ config('app.version') }}" />
    <link rel="stylesheet" href="/css/lib/toastify.min.css?v={{ config('app.version') }}" />


    <link rel="preload" as="style" href="/css/global.css?v={{ config('app.version') }}" />
    <link rel="stylesheet" href="/css/global.css?v={{ config('app.version') }}" />

    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" />

    <script async defer src="/js/base.js?v={{ config('app.version') }}"></script>
</head>

<body class="font-sans antialiased bg-gray-50">
    <x-banner />
    <div class="min-h-screen flex flex-col bg-gray-100">
        <div class="flex grow flex-row">
            <input type="checkbox" id="app-sidebar-checkbox" class="hidden" />
            <div id="app-sidebar-container" class="flex flex-col shrink-0">
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

                        <a href="{{ route('dashboard.esims') }}" class="{{ request()->routeIs('dashboard.esims') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M280-200h80v-80h-80v80Zm0-160h80v-160h-80v160Zm160 160h80v-160h-80v160Zm0-240h80v-80h-80v80Zm160 240h80v-80h-80v80Zm0-160h80v-160h-80v160ZM240-80q-33 0-56.5-23.5T160-160v-480l240-240h320q33 0 56.5 23.5T800-800v640q0 33-23.5 56.5T720-80H240Zm0-80h480v-640H434L240-606v446Zm0 0h480-480Z" /></svg>
                            <span>New eSIMs</span>
                        </a>

                        <a href="{{ route('recharges.index') }}" class="{{ request()->routeIs('recharges.index') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M460-280v-160h-80l120-240v160h80L460-280ZM280-40q-33 0-56.5-23.5T200-120v-720q0-33 23.5-56.5T280-920h400q33 0 56.5 23.5T760-840v720q0 33-23.5 56.5T680-40H280Zm0-120v40h400v-40H280Zm0-80h400v-480H280v480Zm0-560h400v-40H280v40Zm0 0v-40 40Zm0 640v40-40Z" /></svg>
                            <span>Recharges</span>
                        </a>

                        <a href="{{ route('withdrawals.index') }}" class="{{ request()->routeIs('withdrawals.index') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M440-200h80v-40h40q17 0 28.5-11.5T600-280v-120q0-17-11.5-28.5T560-440H440v-40h160v-80h-80v-40h-80v40h-40q-17 0-28.5 11.5T360-520v120q0 17 11.5 28.5T400-360h120v40H360v80h80v40ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-560v-160H240v640h480v-480H520ZM240-800v160-160 640-640Z"/></svg>
                            <span>Request Withdrawl</span>
                        </a>

                        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.index') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/></svg>
                            <span>Users</span>
                        </a>

                        @if( auth()->user()->isAdmin() )
                            <a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.index') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M280-280h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                                <span>Articles</span>
                            </a>

                            <a href="{{ route('article-categories.index') }}" class="{{ request()->routeIs('article-categories.index') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="m260-520 220-360 220 360H260ZM700-80q-75 0-127.5-52.5T520-260q0-75 52.5-127.5T700-440q75 0 127.5 52.5T880-260q0 75-52.5 127.5T700-80Zm-580-20v-320h320v320H120Zm580-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-500-20h160v-160H200v160Zm202-420h156l-78-126-78 126Zm78 0ZM360-340Zm340 80Z"/></svg>
                                <span>Article Categories</span>
                            </a>

                            <a href="{{ route('settings.index') }}" class="{{ request()->routeIs('settings.index') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M433-80q-27 0-46.5-18T363-142l-9-66q-13-5-24.5-12T307-235l-62 26q-25 11-50 2t-39-32l-47-82q-14-23-8-49t27-43l53-40q-1-7-1-13.5v-27q0-6.5 1-13.5l-53-40q-21-17-27-43t8-49l47-82q14-23 39-32t50 2l62 26q11-8 23-15t24-12l9-66q4-26 23.5-44t46.5-18h94q27 0 46.5 18t23.5 44l9 66q13 5 24.5 12t22.5 15l62-26q25-11 50-2t39 32l47 82q14 23 8 49t-27 43l-53 40q1 7 1 13.5v27q0 6.5-2 13.5l53 40q21 17 27 43t-8 49l-48 82q-14 23-39 32t-50-2l-60-26q-11 8-23 15t-24 12l-9 66q-4 26-23.5 44T527-80h-94Zm7-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>
                                <span>Settings</span>
                            </a>

                            <a href="{{ route('switches.index') }}" class="{{ request()->routeIs('switches.index') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M480-120q-17 0-28.5-11.5T440-160v-160q0-17 11.5-28.5T480-360q17 0 28.5 11.5T520-320v40h280q17 0 28.5 11.5T840-240q0 17-11.5 28.5T800-200H520v40q0 17-11.5 28.5T480-120Zm-320-80q-17 0-28.5-11.5T120-240q0-17 11.5-28.5T160-280h160q17 0 28.5 11.5T360-240q0 17-11.5 28.5T320-200H160Zm160-160q-17 0-28.5-11.5T280-400v-40H160q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h120v-40q0-17 11.5-28.5T320-600q17 0 28.5 11.5T360-560v160q0 17-11.5 28.5T320-360Zm160-80q-17 0-28.5-11.5T440-480q0-17 11.5-28.5T480-520h320q17 0 28.5 11.5T840-480q0 17-11.5 28.5T800-440H480Zm160-160q-17 0-28.5-11.5T600-640v-160q0-17 11.5-28.5T640-840q17 0 28.5 11.5T680-800v40h120q17 0 28.5 11.5T840-720q0 17-11.5 28.5T800-680H680v40q0 17-11.5 28.5T640-600Zm-480-80q-17 0-28.5-11.5T120-720q0-17 11.5-28.5T160-760h320q17 0 28.5 11.5T520-720q0 17-11.5 28.5T480-680H160Z"/></svg>
                                <span>Switches</span>
                            </a>

                        @endif

                        <a href="{{ route('dashboard.support') }}" class="{{ request()->routeIs('dashboard.support') ? 'text-primary-800 bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 border-b items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M200-160q-33 0-56.5-23.5T120-240v-280q0-74 28.5-139.5T226-774q49-49 114.5-77.5T480-880q74 0 139.5 28.5T734-774q49 49 77.5 114.5T840-520v400q0 33-23.5 56.5T760-40H520q-17 0-28.5-11.5T480-80q0-17 11.5-28.5T520-120h240v-40h-80q-33 0-56.5-23.5T600-240v-160q0-33 23.5-56.5T680-480h80v-40q0-116-82-198t-198-82q-116 0-198 82t-82 198v40h80q33 0 56.5 23.5T360-400v160q0 33-23.5 56.5T280-160h-80Zm0-80h80v-160h-80v160Zm480 0h80v-160h-80v160ZM200-400h80-80Zm480 0h80-80Z"/></svg>
                            <span>Contact Support</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="block w-full">
                            @csrf
                            <button type="submit" class="text-left w-full text-gray-600 hover:bg-gray-100 flex px-2 py-2 border-b items-center gap-2 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                                <span>{{ __('Log out') }}</span>
                            </button>
                        </form>


                    </div>
                    <div class="text-center py-1">
                        <a href="https://www.example.com" target="_blank" rel="noopener noreferrer nofollow" class="text-sm leading-none">Built with MeegoTravel Team</a>
                    </div>
                </div>
            </div>
            <div id="app-content" class="flex flex-col grow-0 shrink w-full max-w-full">
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

    @if(!empty($tinymce))
        <script src="/js/lib/tinymce/tinymce.min.js?v={{ config('app.version') }}" ></script>
        <script type="text/javascript">
            (function(){
                tinymce.init({
                    selector: '#my-tinymce-editor',
                    plugins: 'table lists',
                    placeholder: 'Type here...',
                    toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table',
                    content_css: '/css/lib/mce.css',
                });
            })();
        </script>
    @endif

    @if(!empty($ckeditor))
        <script src="/assets/ckeditor5/build/ckeditor.js?v={{ config('app.version') }}"></script>
        <script type="text/javascript">
            var appCkEditor = null;
            (function(){
                var appCkeditorTextarea = document.getElementById('app-ckeditor-textarea');
                if(appCkeditorTextarea){
                    ClassicEditor.create(appCkeditorTextarea)
                        .then(function(editor){
                            appCkEditor = editor;
                            // console.log(editor.getData());
                        }).catch(function(error){
                            console.error( error );
                        });
                }
            })();
        </script>
    @endif

    <script defer src="/js/utils.js?v={{ config('app.version') }}"></script>
    @if( isset($scripts) ) {{ $scripts }} @endif
    <script defer src="/js/global.js?v={{ config('app.version') }}"></script>
</body>
</html>