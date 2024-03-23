<x-app-layout>
    <div x-data="{
        qr_installation_modal_open: false,
        manual_installation_modal_open: false,
        countries_modal_open: false,
        compatible_devices_modal_open: false,
        devices_confirmation: false,
        devicesConfirmationChange(){
            if( this.devices_confirmation ){
                this.compatible_devices_modal_open = true;
            }
        },
        closedCompatibleDevicesModal(){
            this.compatible_devices_modal_open = false;
            this.devices_confirmation = false;
            console.log(this.devices_confirmation);
        },
        confirmCloseCompatibleDevicesModal(){
            this.compatible_devices_modal_open = false;
            this.devices_confirmation = true;
        }
    }" class="container px-3 py-5">
        <h1 class="text-3xl md:text-4xl mb-4 text-center font-semibold">Buy {{ $operator['title'] }} eSIM</h1>
        <div class="flex mb-4 flex-wrap mx-auto max-w-2xl items-center">
            <div class="w-full sm:w-6/12 text-center">
                <img src="{{ $operator['image']['url'] }}" alt="logo" class="inline-block relative z-1 w-64 md:w-72 max-w-full h-auto" />
            </div>
            <div class="w-full sm:w-6/12 -mt-16 sm:mt-0 sm:-ml-20">
                <div class="pt-20 sm:pt-4 sm:pl-20 sm:pr-6 pb-4 px-4 sm:min-h-52 sm:flex flex-col justify-center max-w-sm mx-auto rounded-xl text-white" style="background:linear-gradient(7deg, <?php echo $operator['gradient_start']; ?>, <?php echo $operator['gradient_end']; ?>);">
                    <div class="flex gap-3 justify-between py-1 border-b border-white/25">
                        <p>Coverage</p>
                        <p class="text-right">
                            @if( count($operator['countries']) > 1 )
                                {{ count($operator['countries']) }} countries
                            @else
                                {{ $operator['countries'][0]['title'] }}
                            @endif
                        </p>
                    </div>
                    <div class="flex gap-3 justify-between py-1 border-b border-white/25">
                        <p>Data</p>
                        <p class="text-right">{{ $package['data'] }}</p>
                    </div>
                    <div class="flex gap-3 justify-between py-1 border-b border-white/25">
                        <p>Validity</p>
                        <p class="">{{ $package['day'] }} days</p>
                    </div>
                    <div class="flex gap-3 justify-between py-1">
                        <p>Price</p>
                        <p class="text-right">${{ number_format($package['price'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-2 mb-3 flex-wrap justify-center">
            <x-button type="button" @click="qr_installation_modal_open = true">QR Installation</x-button>
            <x-button type="button" @click="manual_installation_modal_open = true">Manual Installation</x-button>
            @if( count($operator['countries']) > 1 )
                <x-button type="button" @click="countries_modal_open = true">Countries</x-button>
            @endif
        </div>

        <div class="max-w-2xl mx-auto">
            <label class="flex gap-2 items-baseline">
                <span class="">
                    <input type="checkbox" x-model="devices_confirmation" @change="devicesConfirmationChange()" class="rounded w-5 h-5 text-primary-500 focus:ring-primary-500" />
                </span>
                <span class="leading-tight text-gray-700 select-none cursor-pointer">Before completing this order, please confirm your device is eSIM compatible and network-unlocked. <span class="underline font-medium text-gray-800">View supported devices.</span></span>
            </label>
        </div>


        <div @keydown.escape.prevent.stop="qr_installation_modal_open = false" x-show="qr_installation_modal_open" class="fixed top-0 left-0 bottom-0 right-0 w-full h-full overflow-hidden" role="dialog" aria-modal="true" style="z-index:10;">
            <div class="relative h-full flex items-end mx-auto px-3 max-w-2xl w-auto">
                <div x-cloak x-show="qr_installation_modal_open" @click="qr_installation_modal_open = false" x-transition:enter="transition ease-out transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 backdrop-blur-sm cursor-pointer transition-opacity bg-gray-900 bg-opacity-40" aria-hidden="true"></div>
                <div x-cloak x-show="qr_installation_modal_open" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-32" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-32" class="relative flex flex-col w-full max-h-[95vh] rounded-t-md shadow-lg overflow-hidden transition-all bg-white">
                    <div class="overflow-y-auto px-4 py-5 app-scrollbar">
                        <h3 class="text-2xl mb-3 font-semibold text-gray-800">QR Installation</h3>
                       <div class="prose max-w-full">{!! $package['qr_installation'] !!}</div>
                    </div>
                    <div class="absolute top-0 right-0 px-4 py-2">
                        <button type="button" @click="qr_installation_modal_open = false" class="rounded-full px-1 py-1 border border-red-200 text-red-500 bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div @keydown.escape.prevent.stop="manual_installation_modal_open = false" x-show="manual_installation_modal_open" class="fixed top-0 left-0 bottom-0 right-0 w-full h-full overflow-hidden" role="dialog" aria-modal="true" style="z-index:10;">
            <div class="relative h-full flex items-end mx-auto px-3 max-w-2xl w-auto">
                <div x-cloak x-show="manual_installation_modal_open" @click="manual_installation_modal_open = false" x-transition:enter="transition ease-out transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 backdrop-blur-sm cursor-pointer transition-opacity bg-gray-900 bg-opacity-40" aria-hidden="true"></div>
                <div x-cloak x-show="manual_installation_modal_open" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-32" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-32" class="relative flex flex-col w-full max-h-[95vh] rounded-t-md shadow-lg overflow-hidden transition-all bg-white">
                    <div class="overflow-y-auto px-4 py-5 app-scrollbar">
                        <h3 class="text-2xl mb-3 font-semibold text-gray-800">Manual Installation</h3>
                       <div class="prose max-w-full">{!! $package['manual_installation'] !!}</div>
                    </div>
                    <div class="absolute top-0 right-0 px-4 py-2">
                        <button type="button" @click="manual_installation_modal_open = false" class="rounded-full px-1 py-1 border border-red-200 text-red-500 bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div @keydown.escape.prevent.stop="closedCompatibleDevicesModal()" x-show="compatible_devices_modal_open" class="fixed top-0 left-0 bottom-0 right-0 w-full h-full overflow-hidden" role="dialog" aria-modal="true" style="z-index:10;">
            <div class="relative h-full flex items-end mx-auto px-3 max-w-2xl w-auto">
                <div x-cloak x-show="compatible_devices_modal_open" @click="closedCompatibleDevicesModal()" x-transition:enter="transition ease-out transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 backdrop-blur-sm cursor-pointer transition-opacity bg-gray-900 bg-opacity-40" aria-hidden="true"></div>
                <div x-cloak x-data="{search: '', show(el){ return this.search === '' || el.textContent.toLowerCase().includes(this.search.toLowerCase()); }}" x-show="compatible_devices_modal_open" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-32" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-32" class="relative flex flex-col w-full max-h-[95vh] rounded-t-md shadow-lg overflow-hidden transition-all bg-white">
                    <div class="border-b">
                        <div class="px-4 py-2 mt-2">
                            <h3 class="text-2xl font-semibold text-gray-800">Supported Devices</h3>
                        </div>
                        <div class="flex-none relative">
                            <input type="text" x-model="search" placeholder="Search device..." spellcheck="false" autocomplete="off" class="border-0 px-5 focus:outline-none focus:ring-0 w-full bg-gray-100">
                            <div class="absolute flex items-center justify-center px-4 text-gray-400 top-0 right-0 bottom-0 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-y-auto min-h-64 pb-10 app-scrollbar">
                        @if( !empty($compatibleDevices['data']) )
                            @foreach($compatibleDevices['data'] as $device)
                                <div x-show="show($el)" class="flex px-5 py-2 flex-col {{ $loop->last ? '' : 'border-b' }}">
                                    <small>{{ $device['model'] }} - {{ $device['os'] }}</small>
                                    <p>{{ $device['brand'] }} {{ $device['name'] }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="mt-auto px-5 py-3 text-center border-t">
                        <x-button @click="confirmCloseCompatibleDevicesModal()" type="button">Read and Accept</x-button>
                    </div>
                    <div class="absolute top-0 right-0 px-4 py-2">
                        <button type="button" @click="closedCompatibleDevicesModal()" class="rounded-full px-1 py-1 border border-red-200 text-red-500 bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div @keydown.escape.prevent.stop="countries_modal_open = false" x-show="countries_modal_open" class="fixed top-0 left-0 bottom-0 right-0 w-full h-full overflow-hidden" role="dialog" aria-modal="true" style="z-index:10;">
            <div class="relative h-full flex items-end mx-auto px-3 max-w-2xl w-auto">
                <div x-cloak x-show="countries_modal_open" @click="countries_modal_open = false" x-transition:enter="transition ease-out transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 backdrop-blur-sm cursor-pointer transition-opacity bg-gray-900 bg-opacity-40" aria-hidden="true"></div>
                <div x-cloak x-data="{search: '', show(el){ return this.search === '' || el.textContent.toLowerCase().includes(this.search.toLowerCase()); }}" x-show="countries_modal_open" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-32" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-32" class="relative flex flex-col w-full max-h-[95vh] rounded-t-md shadow-lg overflow-hidden transition-all bg-white">
                    <div class="border-b">
                        <div class="px-4 py-2 mt-2">
                            <h3 class="text-2xl font-semibold text-gray-800">Supported Countries</h3>
                        </div>
                        <div class="flex-none relative">
                            <input type="text" x-model="search" placeholder="Search country..." spellcheck="false" autocomplete="off" class="border-0 px-5 focus:outline-none focus:ring-0 w-full bg-gray-100">
                            <div class="absolute flex items-center justify-center px-4 text-gray-400 top-0 right-0 bottom-0 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-y-auto min-h-64 pb-10 app-scrollbar">
                        @foreach($operator['countries'] as $country)
                            <div x-show="show($el)" class="flex gap-2 px-5 py-2 {{ $loop->last ? '' : 'border-b' }}">
                                <div class="flex-none">
                                    <img src="{{ $country['image']['url'] }}" class="w-8 h-auto rounded" alt="{{ $country['country_code'] }}" />
                                </div>
                                <p>{{ $country['title'] }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="absolute top-0 right-0 px-4 py-2">
                        <button type="button" @click="countries_modal_open = false" class="rounded-full px-1 py-1 border border-red-200 text-red-500 bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>