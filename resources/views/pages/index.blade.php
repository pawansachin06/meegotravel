<x-app-layout aos="1" swiper="1">
    <section class="relative py-5">
        <div class="md:container px-3 py-5 flex flex-wrap justify-center">
            <div class="w-full md:w-11/12 lg:w-11/12 xl:w-9/12 2xl:w-7/12 mb-8 text-center">
                <small class="inline-block px-3 py-1 mb-3 rounded-full text-base font-semibold bg-primary-100 text-primary-500">Best Place to Buy eSIMs</small>
                <h1 class="text-3xl md:text-4xl lg:text-5xl !leading-snug mb-3 font-bold">Topups, eSIMs, and Digital Products Marketplace</h1>
                <p class="mb-4 text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Deleniti odio, nostrum minus nisi perspiciatis tenetur doloremque, dolorum qui neque laudantium iure id, ipsa aut autem quia optio nam aliquid dolore?</p>
                <div class="max-w-2xl mx-auto">
                    <div class="relative mb-3">
                        <input type="text" placeholder="Search for a destination..." title="Search for a destination" spellcheck="false" class="w-full text-lg pl-4 pr-16 py-4 border-0 shadow-lg rounded-md focus:ring-primary-500" />
                        <div class="absolute px-2 flex justify-center items-center top-0 bottom-0 right-0">
                            <button type="submit" title="Search" class="px-2 py-2 inline-flex items-center justify-center leading-none rounded-full focus:outline-primary-400 focus:outline-offset-2 bg-primary-500 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-7 h-7" width="24" height="24" viewBox="0 -960 960 960">
                                    <path d="M380-320q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l224 224q11 11 11 28t-11 28q-11 11-28 11t-28-11L532-372q-30 24-69 38t-83 14Zm0-80q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 justify-evenly px-1">
                        <div class="">
                            <p class="text-sm text-gray-400">34 k+ Prodcuts</p>
                        </div>
                        <div class="">
                            <p class="text-sm text-gray-400">243 k+ Users</p>
                        </div>
                        <div class="">
                            <p class="text-sm text-gray-400">2 + Million Sells</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(!empty($countryGroups))
        <div class="container px-3 py-2">
            <div class="mb-8">
                <h2 class="text-2xl md:text-4xl !leading-snug text-center mb-2 font-bold">Popular eSIM destinations</h2>
                <p class="text-center text-gray-600 mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing, elit.</p>
                <div id="home-country-slider" class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($countryGroups as $i => $countryGroup)
                            <div class="swiper-slide">
                                <a href="{{ route('sims.show', ['countrySlug' => $countryGroup['slug']]) }}" class="block w-full px-3 py-3 rounded text-center border-b-2 border-primary-200 hover:border-primary-500 shadow-lg transition-colors bg-primary-50 hover:bg-primary-100">
                                    <span class="inline-block mb-2 w-14 h-14">
                                        <picture>
                                            <img src="{{ $countryGroup['image']['url'] }}" alt="flag" class="w-full h-auto rounded-md" />
                                        </picture>
                                    </span>
                                    <p class="font-semibold leading-tight">{{ $countryGroup['title'] }}</p>
                                    <p class="text-sm">{{ count($countryGroup['operators']) }} eSIM{{ count($countryGroup['operators']) > 1 ? 's' : '' }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container px-3">
        <div data-aos="fade-up" class="mb-8 max-w-4xl mx-auto">
            <div id="home-offer-slider" class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="/">
                            <img src="https://dummyimage.com/1400x400" alt="offer" class="w-full h-auto" />
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/">
                            <img src="https://dummyimage.com/1400x400" alt="offer" class="w-full h-auto" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-3">
        <h2 class="text-2xl md:text-4xl !leading-snug text-center mb-2 font-bold">Jump To</h2>
        <p class="text-center text-gray-600 mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing, elit.</p>
        <div class="flex flex-wrap -mx-1 mb-8">
            <div class="w-full sm:w-6/12 px-1 mb-2">
                <a href="/" title="Topup" class="inline-flex gap-2 justify-center items-center w-full px-3 py-5 border rounded-md shadow-lg bg-primary-50 hover:text-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-7 w-7" width="24" height="24" viewBox="0 -960 960 960">
                        <path d="M460-280v-160h-80l120-240v160h80L460-280ZM280-40q-33 0-56.5-23.5T200-120v-720q0-33 23.5-56.5T280-920h400q33 0 56.5 23.5T760-840v720q0 33-23.5 56.5T680-40H280Zm0-120v40h400v-40H280Zm0-80h400v-480H280v480Zm0-560h400v-40H280v40Zm0 0v-40 40Zm0 640v40-40Z" />
                    </svg>
                    <span class="text-lg font-semibold">Topup</span>
                </a>
            </div>
            <div class="w-full sm:w-6/12 px-1 mb-2">
                <a href="/" title="Check Usage" class="inline-flex gap-2 justify-center items-center w-full px-3 py-5 border rounded-md shadow-lg bg-primary-50 hover:text-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-7 w-7" width="24" height="24" viewBox="0 -960 960 960">
                        <path d="M480-80q-83 0-156-31.5t-127-86Q143-252 111.5-325T80-480q0-157 104-270t256-128v120q-103 14-171.5 92.5T200-480q0 116 82 198t198 82q66 0 123.5-28t96.5-76l104 60q-54 75-139 119.5T480-80Zm366-238-104-60q9-24 13.5-49.5T760-480q0-107-68.5-185.5T520-758v-120q152 15 256 128t104 270q0 44-8 85t-26 77Z" />
                    </svg>
                    <span class="text-lg font-semibold">Check Usage</span>
                </a>
            </div>
        </div>
    </div>

    <section id="pick-esims" class="container px-3">
        <h2 class="text-2xl md:text-4xl !leading-snug text-center mb-2 font-bold">Popular eSIM offers</h2>
        <p class="text-center text-gray-600 mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing, elit.</p>

        <!-- <div class="mb-4 flex justify-center border-b">
            <a href="{{ route('home') }}#pick-esims" class="inline-block px-3 py-2 rounded-t-md {{ request()->routeIs('home') ? 'border-t border-l border-r -mb-[1px] bg-gray-50' : 'text-gray-500' }}">
                Local eSIMs
            </a>
            <a href="{{ route('home.regional') }}#pick-esims" class="inline-block px-3 py-2 rounded-t-md {{ request()->routeIs('home.regional') ? 'border-t border-l border-r -mb-[1px] bg-gray-50' : 'text-gray-500' }}">
                Regional eSIMs
            </a>
            <a href="{{ route('home.global') }}#pick-esims" class="inline-block px-3 py-2 rounded-t-md {{ request()->routeIs('home.global') ? 'border-t border-l border-r -mb-[1px] bg-gray-50' : 'text-gray-500' }}">
                Global eSIMs
            </a>
        </div> -->

        <div class="flex flex-wrap -mx-2 mb-8">
            @foreach($groups as $group)
                @if(!empty($group['operators']))
                    @foreach($group['operators'] as $operator)
                        @if( $type == 'regional' && $group['slug'] == 'world' )
                            @continue
                        @endif
                        @if( $type == 'global' && $group['slug'] !== 'world' )
                            @continue
                        @endif
                        @if( !empty($operator['packages']) )
                            @foreach($operator['packages'] as $package)
                                @if($count < $maxOffers)
                                    @php $count++ @endphp
                                    <div class="w-full sm:w-6/12 lg:w-4/12 xl:w-3/12 px-2 mb-3">
                                        <x-sims.card :operator="$operator" :package="$package" :group="$group" />
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </section>

    <div class="bg-primary-100 pb-10">
        <div class="container px-3 py-9">
            <h2 class="text-2xl md:text-4xl max-w-4xl mx-auto !leading-snug text-center mb-3 font-bold text-center">MeegoTravel brings the best eSIM products from telecom operators under one roof</h2>
            <div class="flex mb-2 flex-wrap gap-5 justify-center gap-2">
                <div data-aos="fade-up" class="w-12 h-12">
                    <img src="https://mobimatter.com/static/images/3hk2.webp" alt="logo" class="block w-full h-full object-contain object-center" />
                </div>
                <div data-aos="fade-up" data-aos-delay="50" class="w-12 h-12">
                    <img src="https://mobimatter.com/static/images/o2img2.webp" alt="logo" class="block w-full h-full object-contain object-center" />
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="w-12 h-12">
                    <img src="https://mobimatter.com/static/images/esimgo.webp" alt="logo" class="block w-full h-full object-contain object-center" />
                </div>
                <div data-aos="fade-up" data-aos-delay="150" class="w-12 h-12">
                    <img src="https://mobimatter.com/static/images/telenor.webp" alt="logo" class="block w-full h-full object-contain object-center" />
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="w-12 h-12">
                    <img src="https://mobimatter.com/static/images/Orange.webp" alt="logo" class="block w-full h-full object-contain object-center" />
                </div>
                <div data-aos="fade-up" data-aos-delay="250" class="w-12 h-12">
                    <img src="https://mobimatter.com/static/images/sim2fly.webp" alt="logo" class="block w-full h-full object-contain object-center" />
                </div>
            </div>
        </div>
    </div>
    <div class="container px-3 -mt-10 mb-10">
        <div class="max-w-4xl mx-auto px-5 py-7 mb-8 rounded-md shadow-lg bg-white">
            <div class="flex justify-between flex-wrap">
                <div class="w-full sm:w-7/12 lg:w-6/12 mb-5 sm:mb-0 sm:pr-4 text-center sm:text-left">
                    <h2 class="text-2xl md:text-4xl mb-3 !leading-snug font-bold">Boost your eSIM experience</h2>
                    <p class="mb-5 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing, elit.</p>
                    <x-button href="/">Download App</x-button>
                </div>
                <div class="w-full sm:w-5/12 text-center sm:text-right">
                    <img src="https://dummyimage.com/400x250" alt="image" class="inline-block" />
                </div>
            </div>
        </div>
    </div>


</x-app-layout>