<header id="app-header" class="sticky top-0 shadow-lg bg-white">
    <div class="xl:container px-2 h-14 flex items-center justify-between">
        <a href="/" title="{{ config('app.name', '') }}" class="inline-block py-1 focus:outline-primary-500 focus:outline-offset-2 select-none">
            <picture>
                <img src="/img/logo.png?v=1" alt="logo" />
            </picture>
        </a>

        <nav class="flex gap-2 items-center">
            <ul class="hidden lg:flex gap-3 select-none">
                <x-header.menu-item href="{{ route('home') }}" :active="request()->routeIs('home')">New eSIM</x-header.menu-item>
                <x-header.menu-item href="{{ route('topup') }}" :active="request()->routeIs('topup')">Topup</x-header.menu-item>
                <x-header.menu-item href="{{ route('check-usage') }}" :active="request()->routeIs('check-usage')">Check Usage</x-header.menu-item>
                <x-header.menu-item href="{{ route('articles.front.index') }}" :active="request()->routeIs('articles.front.index')">Blog</x-header.menu-item>
                <x-header.menu-item href="{{ route('troubleshoot') }}" :active="request()->routeIs('troubleshoot')">Help & Support</x-header.menu-item>
                <x-header.menu-item href="{{ route('faqs') }}" :active="request()->routeIs('faqs')">FAQs</x-header.menu-item>
            </ul>
            @auth
                <div class="relative" x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close()
                            }
                            this.$refs.button.focus();
                            this.open = true;
                        },
                        close(focusAfter) {
                            if (! this.open) return;
                            this.open = false;
                            focusAfter && focusAfter.focus();
                        }
                    }" x-on:keydown.escape.prevent.stop="close($refs.button)" x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']">
                    <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')" type="button" class="flex items-center">
                        <span class="relative w-11 h-11 border-2 border-primary-200 rounded-md select-none">
                            <span class="fade-away absolute flex items-center justify-center left-0 right-0 top-0 bottom-0 w-full h-full">
                                <x-loader class="h-6 w-6" />
                            </span>
                            <picture class="relative">
                                <img src="{{ auth()->user()->profile_photo_url }}" loading="lazy" width="44" height="44" class="w-full h-full object-cover object-center rounded" />
                            </picture>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display:none;" class="absolute right-0 my-1 w-48 rounded-md overflow-hidden bg-white shadow-md">
                        <a href="{{ route('dashboard') }}" class="block px-3 py-3 leading-none {{ request()->routeIs('dashboard') ? 'bg-gray-800 text-white' : 'hover:bg-gray-100' }}">{{ __('My Account') }}</a>
                        <hr />
                        <form method="POST" action="{{ route('logout') }}" class="block w-full">
                            @csrf
                            <button type="submit" class="text-left text-red-600 block w-full px-3 py-3 leading-none hover:bg-gray-100">{{ __('Log out') }}</button>
                        </form>
                    </div>
                </div>
            @endauth
            @guest
                <x-button href="{{ route('login') }}" class="text-nowrap">
                    Join Now
                </x-button>
            @endguest

            <label for="app-sidenav-checkbox" title="Toggle sidebar" class="app-sidebar-btn group inline-flex lg:hidden items-center justify-center cursor-pointer transition-colors">
                <span class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-primary-50 border border-primary-200 group-hover:bg-primary-100 group-hover:text-primary-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960">
                        <path d="M160-240q-17 0-28.5-11.5T120-280q0-17 11.5-28.5T160-320h640q17 0 28.5 11.5T840-280q0 17-11.5 28.5T800-240H160Zm0-200q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h640q17 0 28.5 11.5T840-480q0 17-11.5 28.5T800-440H160Zm0-200q-17 0-28.5-11.5T120-680q0-17 11.5-28.5T160-720h640q17 0 28.5 11.5T840-680q0 17-11.5 28.5T800-640H160Z" />
                    </svg>
                </span>
            </label>
        </nav>
    </div>
</header>