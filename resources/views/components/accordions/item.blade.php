<div class="group mb-2 outline-none bg-primary-50" tabindex="1">
    <div class="group flex group-focus:border-b justify-between px-3 py-3 items-center transition ease duration-500 cursor-pointer relative">
        <div class="group-focus:text-primary-500 font-semibold transition ease duration-500">
            {{ !empty($title) ? $title : 'Enter title for accordion' }}
        </div>
        <div class="px-1 transform transition ease duration-500 group-focus:text-primary-500 group-focus:-rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="32" height="32" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
        </div>
    </div>
    <div class="group-focus:max-h-screen max-h-0 bg-primary-50 px-4 overflow-hidden ease duration-500">
        <div class="prose py-3 text-justify">
            {{ $slot }}
        </div>
    </div>
</div>