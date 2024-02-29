<header id="app-header" class="sticky top-0 shadow-lg bg-white">
    <div class="xl:container px-3 h-14 flex items-center justify-between">
        <div class="inline-flex items-center gap-2">
            <label for="app-sidebar-checkbox" title="Toggle sidebar" class="app-sidebar-btn group inline-flex items-center justify-center cursor-pointer text-gray-600 hover:text-gray-900 transition-colors">
                <span class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960">
                        <path d="M160-240q-17 0-28.5-11.5T120-280q0-17 11.5-28.5T160-320h640q17 0 28.5 11.5T840-280q0 17-11.5 28.5T800-240H160Zm0-200q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h640q17 0 28.5 11.5T840-480q0 17-11.5 28.5T800-440H160Zm0-200q-17 0-28.5-11.5T120-680q0-17 11.5-28.5T160-720h640q17 0 28.5 11.5T840-680q0 17-11.5 28.5T800-640H160Z" />
                    </svg>
                </span>
            </label>

            <a href="/" title="{{ config('app.name', '') }}" class="inline-block py-1 select-none">
                <picture>
                    <img src="https://dummyimage.com/215x45" alt="logo" />
                </picture>
            </a>
        </div>

        <nav class="flex gap-3 items-center">
            <ul class="hidden lg:flex gap-3">
                <li>
                    <a href="" class="inline-block px-1 py-3 hover:text-primary-500">New eSIM</a>
                </li>
                <li>
                    <a href="" class="inline-block px-1 py-3 hover:text-primary-500">Topup</a>
                </li>
                <li>
                    <a href="" class="inline-block px-1 py-3 hover:text-primary-500">Check Usage</a>
                </li>
                <li>
                    <a href="" class="inline-block px-1 py-3 hover:text-primary-500">Blog</a>
                </li>
                <li>
                    <a href="" class="inline-block px-1 py-3 hover:text-primary-500">Help & Support</a>
                </li>
                <li>
                    <a href="" class="inline-block px-1 py-3 hover:text-primary-500">FAQs</a>
                </li>
            </ul>
            <x-button class="text-nowrap">
                Join Now
            </x-button>
        </nav>
    </div>
</header>