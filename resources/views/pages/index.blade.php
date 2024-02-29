<x-app-layout aos="1" swiper="1">
    <section class="relative py-5">
        <div class="md:container px-3 py-5 flex flex-wrap justify-center">
            <div class="w-full md:w-11/12 lg:w-11/12 xl:w-9/12 2xl:w-7/12 mb-8 text-center">
                <small class="inline-block px-3 py-1 mb-3 rounded-full text-base font-semibold bg-primary-100 text-primary-500">Best Place to Buy eSIMs</small>
                <h1 class="text-3xl md:text-4xl mb-3 font-bold">Topups, eSIMs, and Digital Products Marketplace</h1>
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

    <div class="container px-3 py-2">
        <div class="mb-8">
            <h2 class="text-xl mb-2 font-semibold">Popular eSIM destinations</h2>
            <div id="home-country-slider" class="swiper">
                <div class="swiper-wrapper">
                    @for($i = 0; $i < 10; $i++)
                    <div class="swiper-slide">
                        <div class="text-center">
                            <div class="inline-block shadow-lg w-14 h-14 px-2 py-2 rounded-full">
                                <picture>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/United-states_flag_icon_round.svg/240px-United-states_flag_icon_round.svg.png" alt="flag" class="w-full h-auto" />
                                </picture>
                            </div>
                            <p class="text-sm">USA {{ $i }}</p>
                        </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <div data-aos="fade-up" class="mb-8 max-w-4xl mx-auto">
        <div id="home-offer-slider" class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="/">
                        <img src="https://d2tlmlryquimxf.cloudfront.net/mobimatter-assests/assets/offerBanner1.webp" alt="offer" class="w-full h-auto" />
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/">
                        <img src="https://d2tlmlryquimxf.cloudfront.net/mobimatter-assests/assets/offerBanner1.webp" alt="offer" class="w-full h-auto" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-xl mb-2 font-semibold">Jump To</h2>
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

    <h2 class="text-xl mb-2 font-semibold">Popular eSIM offers</h2>
    <div class="flex flex-wrap -mx-2 mb-8">
        @for($i = 0; $i < 9; $i++)
        <div class="w-full sm:w-6/12 lg:w-4/12 xl:w-3/12 px-2 mb-3">
            <div class="px-2 py-2 shadow-lg rounded-md bg-white">
                <div class="flex gap-2 justify-between">
                    <div class="inline-flex mb-2 items-center gap-1">
                        <img src="https://d2tlmlryquimxf.cloudfront.net/mobimatter-assests/assets/sparks.png" alt="logo" class="w-5 h-auto" />
                        <div class="inline-flex flex-col">
                            <p class="text-sm font-semibold">Europe USA 10+2 GB FREE</p>
                            <small class="text-xs text-gray-600 leading-tight">TSimTech</small>
                        </div>
                    </div>
                    <div class="w-4/12">
                        <p class="text-xs">❄️ Winter Special</p>
                    </div>
                </div>
                <div class="flex mb-2 justify-between">
                    <div class="">
                        <p class="text-xs leading-tight">Validity</p>
                        <p class="text-sm leading-tight font-semibold text-primary-500">30 days</p>
                    </div>
                    <div class="">
                        <p class="text-xs leading-tight">Data</p>
                        <p class="text-sm leading-tight font-semibold text-primary-500">20 GB</p>
                    </div>
                    <div class="">
                        <p class="text-xs leading-tight">Price</p>
                        <p class="text-sm leading-tight font-semibold text-green-500">$24.99</p>
                    </div>
                </div>
                <div class="mb-2 flex gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4 flex-none text-primary-500" width="24" height="24" viewBox="0 -960 960 960">
                        <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q146 0 255.5 91.5T872-559h-82q-19-73-68.5-130.5T600-776v16q0 33-23.5 56.5T520-680h-80v80q0 17-11.5 28.5T400-560h-80v80h80v120h-40L168-552q-3 18-5.5 36t-2.5 36q0 131 92 225t228 95v80Zm364-20L716-228q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-380q0-75 52.5-127.5T620-560q75 0 127.5 52.5T800-380q0 27-8 51t-20 45l128 128-56 56ZM620-280q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Z" />
                    </svg>
                    <p class="text-xs">Works in Brazil, UK and 42 more destinations</p>
                </div>
                <div class="">
                    <x-button href="/" class="w-full">View Offer</x-button>
                </div>
            </div>
    </div>
    @endfor
    </div>

    <div class="px-3 py-5 mb-8 rounded-md shadow-lg bg-white">
        <h2 class="text-xl mb-3 font-semibold text-center">MeegoTravel brings the best eSIM products from telecom operators under one roof</h2>
        <div class="flex mb-2 flex-wrap gap-5 justify-center gap-2">
            <div data-aos="fade-up" class="w-8 h-8">
                <img src="https://mobimatter.com/static/images/3hk2.webp" alt="logo" class="block w-full h-full object-contain object-center" />
            </div>
            <div data-aos="fade-up" data-aos-delay="50" class="w-8 h-8">
                <img src="https://mobimatter.com/static/images/o2img2.webp" alt="logo" class="block w-full h-full object-contain object-center" />
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="w-8 h-8">
                <img src="https://mobimatter.com/static/images/esimgo.webp" alt="logo" class="block w-full h-full object-contain object-center" />
            </div>
            <div data-aos="fade-up" data-aos-delay="150" class="w-8 h-8">
                <img src="https://mobimatter.com/static/images/telenor.webp" alt="logo" class="block w-full h-full object-contain object-center" />
            </div>
            <div data-aos="fade-up" data-aos-delay="200" class="w-8 h-8">
                <img src="https://mobimatter.com/static/images/Orange.webp" alt="logo" class="block w-full h-full object-contain object-center" />
            </div>
            <div data-aos="fade-up" data-aos-delay="250" class="w-8 h-8">
                <img src="https://mobimatter.com/static/images/sim2fly.webp" alt="logo" class="block w-full h-full object-contain object-center" />
            </div>
            <div data-aos="fade-up" data-aos-delay="300" class="w-8 h-8">
                <img src="https://mobimatter.com/static/images/UbigiNewLogo.webp" alt="logo" class="block w-full h-full object-contain object-center" />
            </div>
            <div data-aos="fade-up" data-aos-delay="350" class="w-8 h-8">
                <img src="https://mobimatter.com/static/images/iij2.webp" alt="logo" class="block w-full h-full object-contain object-center" />
            </div>
        </div>
    </div>


    <div class="mb-8">
        <h2 class="text-xl mb-2 text-center font-semibold">Why MeegoTravel eSIM Marketplace?</h2>
        <div class="flex flex-wrap -mx-2">
            <div class="w-6/12 md:w-3/12 px-2 lg:px-4 py-2">
                <div data-aos="fade-up" class="relative">
                    <div class="relative" style="padding-bottom:145%;">
                        <img src="https://mobimatter.com/static/images/storeimag.webp" alt="bg" class="absolute top-0 bottom-0 left-0 right-0 h-full w-full object-cover object-center rounded-md" />
                    </div>
                    <div class="absolute left-0 right-0 top-0 px-2 lg:px-4 py-4 text-center">
                        <h3 class="text-white font-semibold">Instant delivery & ready to use</h3>
                    </div>
                </div>
            </div>
            <div class="w-6/12 md:w-3/12 px-2 lg:px-4 py-2">
                <div data-aos="fade-up" data-aos-delay="50" class="relative">
                    <div class="relative" style="padding-bottom:145%;">
                        <img src="https://mobimatter.com/static/images/storeimag2.webp" alt="bg" class="absolute top-0 bottom-0 left-0 right-0 h-full w-full object-cover object-center rounded-md" />
                    </div>
                    <div class="absolute left-0 right-0 top-0 px-2 lg:px-4 py-4 text-center">
                        <h3 class="text-white font-semibold">Instant delivery & ready to use</h3>
                    </div>
                </div>
            </div>
            <div class="w-6/12 md:w-3/12 px-2 lg:px-4 py-2">
                <div data-aos="fade-up" data-aos-delay="100" class="relative">
                    <div class="relative" style="padding-bottom:145%;">
                        <img src="https://mobimatter.com/static/images/storeimag3.webp" alt="bg" class="absolute top-0 bottom-0 left-0 right-0 h-full w-full object-cover object-center rounded-md" />
                    </div>
                    <div class="absolute left-0 right-0 top-0 px-2 lg:px-4 py-4 text-center">
                        <h3 class="text-white font-semibold">Instant delivery & ready to use</h3>
                    </div>
                </div>
            </div>
            <div class="w-6/12 md:w-3/12 px-2 lg:px-4 py-2">
                <div data-aos="fade-up" data-aos-delay="150" class="relative">
                    <div class="relative" style="padding-bottom:145%;">
                        <img src="https://mobimatter.com/static/images/storeimag4.webp" alt="bg" class="absolute top-0 bottom-0 left-0 right-0 h-full w-full object-cover object-center rounded-md" />
                    </div>
                    <div class="absolute left-0 right-0 top-0 px-2 lg:px-4 py-4 text-center">
                        <h3 class="text-white font-semibold">Instant delivery & ready to use</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
</x-app-layout>