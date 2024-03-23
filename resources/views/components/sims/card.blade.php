@props([
    'operator' => [],
    'group' => [],
    'package' => [],
])

<div x-data="{ open: false }" class="flex flex-col shadow-lg rounded-md bg-white">
    <div class="px-2 py-2">
        <div class="flex gap-2 justify-between">
            <div class="inline-flex mb-2 items-center gap-2">
                <img src="{{ $operator['image']['url'] }}" width="{{ $operator['image']['width'] }}" height="{{ $operator['image']['height'] }}" alt="{{ $operator['title'] }}" class="w-24 h-auto" />
                <div class="inline-flex flex-col">
                    <p class="text-sm font-semibold">{{ $package['title'] }}</p>
                    <small class="text-xs text-gray-600 leading-tight">{{ @$operator['title'] }} ({{ $group['title'] }})</small>
                </div>
            </div>
            <!-- <div class="w-4/12">
                <p class="text-xs">❄️ Winter Special</p>
            </div> -->
        </div>
        <div class="flex mb-2 justify-between">
            <div class="">
                <p class="text-xs leading-tight">Validity</p>
                <p class="text-sm leading-tight font-semibold text-primary-500">{{ $package['day'] }} days</p>
            </div>
            <div class="">
                <p class="text-xs leading-tight">Data</p>
                <p class="text-sm leading-tight font-semibold text-primary-500">{{ $package['data'] }}</p>
            </div>
            <div class="">
                <p class="text-xs leading-tight">Price</p>
                <p class="text-sm leading-tight font-semibold text-green-500">${{ number_format($package['price'], 2) }}</p>
            </div>
        </div>
        <div class="mb-2 flex gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4 flex-none text-primary-500" width="24" height="24" viewBox="0 -960 960 960">
                <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q146 0 255.5 91.5T872-559h-82q-19-73-68.5-130.5T600-776v16q0 33-23.5 56.5T520-680h-80v80q0 17-11.5 28.5T400-560h-80v80h80v120h-40L168-552q-3 18-5.5 36t-2.5 36q0 131 92 225t228 95v80Zm364-20L716-228q-21 12-45 20t-51 8q-75 0-127.5-52.5T440-380q0-75 52.5-127.5T620-560q75 0 127.5 52.5T800-380q0 27-8 51t-20 45l128 128-56 56ZM620-280q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Z" />
            </svg>
            @if( !empty($package['short_info']) )
                <p class="text-xs">{{ $package['short_info'] }}</p>
            @elseif( !empty($operator['other_info']) )
                <p class="text-xs">{{ $operator['other_info'] }}</p>
            @elseif( !empty($operator['info'][0]) )
                <p class="text-xs">{{ $operator['info'][0] }}</p>
            @elseif( !empty($operator['packages'][0]['title']) )
                <p class="text-xs">{{ $operator['packages'][0]['title'] }}</p>
            @endif
        </div>
    </div>
    <div class="mt-auto flex rounded-b-md overflow-hidden">
        <button @click="open = true" class="w-6/12 inline-flex px-2 py-2 justify-center font-semibold bg-gray-200 text-gray-800">View Info</button>
        <a href="{{ route('sims.checkout', ['countrySlug' => $group['slug'], 'packageId' => $package['id'] ]) }}" class="w-6/12 inline-flex px-2 py-2 justify-center font-semibold btn-primary text-white">Buy Now</a>
    </div>

    <!-- modal start -->
    <div @keydown.escape.prevent.stop="open = false" x-show="open" class="fixed top-0 left-0 bottom-0 right-0 w-full h-full overflow-hidden" role="dialog" aria-modal="true" style="z-index:11;">
        <div class="relative h-full flex items-end mx-auto px-3 max-w-2xl w-auto">
            <div x-cloak x-show="open" @click="open = false" x-transition:enter="transition ease-out transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 backdrop-blur-sm cursor-pointer transition-opacity bg-gray-900 bg-opacity-40" aria-hidden="true"></div>
            <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-32" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-32" class="relative flex flex-col w-full max-h-[85vh] rounded-t-md shadow-lg overflow-hidden transition-all bg-white">
                <div class="overflow-y-auto app-scrollbar">
                    <div class="px-4 py-3 text-white" style="background:linear-gradient(7deg, <?php echo $operator['gradient_start']; ?>, <?php echo $operator['gradient_end']; ?>);">
                        <p class="text-2xl mb-2 font-semibold">{{ $operator['title'] }}</p>
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full sm:w-6/12 px-2 py-2">
                                <img src="{{ $operator['image']['url'] }}" width="{{ $operator['image']['width'] }}" height="{{ $operator['image']['height'] }}" alt="{{ $operator['title'] }}" class="w-full h-auto" />
                            </div>
                            <div class="w-full sm:w-6/12 px-2 py-2 self-center">
                                <div class="flex gap-2 justify-between py-1 border-b border-white/25">
                                    <p>Coverage</p>
                                    <p class="text-right">
                                        @if( count($operator['countries']) > 1 )
                                            {{ count($operator['countries']) }} countries
                                        @else
                                            {{ $operator['countries'][0]['title'] }}
                                        @endif
                                    </p>
                                </div>
                                <div class="flex gap-2 justify-between py-1 border-b border-white/25">
                                    <p>Data</p>
                                    <p class="text-right">{{ $package['data'] }}</p>
                                </div>
                                <div class="flex gap-2 justify-between py-1 border-b border-white/25">
                                    <p>Validity</p>
                                    <p class="text-right">{{ $package['day'] }} days</p>
                                </div>
                                <div class="flex gap-2 justify-between py-1">
                                    <p>Price</p>
                                    <p class="text-right">${{ number_format($package['price'], 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 py-3">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full sm:w-6/12 px-2 mb-5">
                                <p class="text-xl mb-1 font-semibold">Supported Countries</p>
                                @if(!empty($operator['countries']))
                                <div x-data="{search: '', show(el){ return this.search === '' || el.textContent.toLowerCase().includes(this.search.toLowerCase()); }}" class="h-56 flex flex-col rounded-md border border-gray-200 shadow">
                                    @if( count($operator['countries']) > 5 )
                                    <div class="flex-none border-b relative">
                                        <input type="text" x-model="search" placeholder="Search country.." spellcheck="false" autocomplete="off" class="border-0 focus:outline-none focus:ring-0 bg-transparent w-full">
                                        <div class="absolute flex items-center justify-center px-2 text-gray-400 top-0 right-0 bottom-0 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="grow h-full overflow-y-auto app-scrollbar">
                                        @foreach($operator['countries'] as $country)
                                            <div x-show="show($el)" class="flex gap-2 px-2 py-2 {{ $loop->last ? '' : 'border-b' }}">
                                                <div class="flex-none">
                                                    <img src="{{ $country['image']['url'] }}" width="{{ $country['image']['width'] }}" height="{{ $country['image']['height'] }}" class="w-8 h-auto rounded" alt="{{ $country['country_code'] }}" />
                                                </div>
                                                <p>{{ $country['title'] }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="w-full sm:w-6/12 px-2">
                                <p class="text-xl mb-1 font-semibold">Additional Information</p>
                                <div class="h-56 rounded-md leading-tight border border-gray-200 shadow">
                                    <div class="h-full overflow-y-auto app-scrollbar">
                                        <div class="px-3 py-1 border-b">
                                            <small class="font-medium text-gray-600">Plan Type</small>
                                            @if( $operator['plan_type'] == 'data' )
                                                <p class="">Data Only</p>
                                            @else
                                                <p class="">{{ $operator['plan_type'] }}</p>
                                            @endif
                                        </div>
                                        <div class="px-3 py-1 border-b">
                                            <small class="font-medium text-gray-600">Activation Policy</small>
                                            @if( $operator['activation_policy'] == 'first-usage' )
                                                <p class="">The validity period starts when the eSIM connects to any supported network/s.</p>
                                            @else
                                                <p class="">{{ $operator['activation_policy'] }}</p>
                                            @endif
                                        </div>
                                        <div class="px-3 py-1 border-b">
                                            <small class="font-medium text-gray-600">eKYC Identity Verification</small>
                                            @if( !empty($operator['is_kyc_verify']) )
                                                <p class="">Required</p>
                                            @else
                                                <p class="">Not Required</p>
                                            @endif
                                        </div>
                                        <div class="px-3 py-1">
                                            <small class="font-medium text-gray-600">Top-up Option</small>
                                            @if( !empty($operator['rechargeability']) )
                                                <p>Available</p>
                                            @else
                                                <p>Not Available</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-auto mb-2 border-t flex justify-between items-center px-3 py-2">
                    <div class="">
                        Price: <span class="text-2xl text-gray-800 font-semibold">${{ number_format($package['price'], 2) }}</span>
                    </div>
                    <div class="">
                        <x-button href="{{ route('sims.checkout', ['countrySlug' => $group['slug'], 'packageId' => $package['id'] ]) }}">Buy Now</x-button>
                    </div>
                </div>
                <div class="absolute top-0 right-0 px-4 py-2">
                    <button type="button" @click="open = false" class="rounded-full px-1 py-1 text-red-500 bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->
</div>