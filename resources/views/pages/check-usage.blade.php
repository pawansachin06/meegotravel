<x-app-layout>
    <x-page-banner :$breadcrumbs title="Check eSIM Usage" />

    <div class="container px-2 py-5">
        <div class="max-w-xl mx-auto px-4 py-4 rounded shadow bg-white">
            <p class="mb-4">You can see your data usage directly from your phone settings.</p>
            <p>Alternatively, enter your order number:</p>
            <div class="flex w-full max-w-xl flex-wrap gap-2">
                <div class="relative grow">
                    <input type="text" required placeholder="MM-12345" spellcheck="false" class="w-full focus:border-primary-500 focus:ring-primary-200 rounded" />
                    <div class="absolute inline-flex items-center px-2 top-0 bottom-0 right-0 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7" width="24" height="24" viewBox="0 -960 960 960">
                            <path d="M380-320q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l224 224q11 11 11 28t-11 28q-11 11-28 11t-28-11L532-372q-30 24-69 38t-83 14Zm0-80q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                        </svg>
                    </div>
                </div>
                <div class="w-full md:w-auto flex-none">
                    <x-button class="w-full">Check <span class="sm:hidden">Usage</span></x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>