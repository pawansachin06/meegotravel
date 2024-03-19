@props([
    'operator' => [],
    'countryCode' => null,
    'countrySlug' => '',
])

<div class="px-2 py-2 shadow-lg rounded-md bg-white">
    <div class="flex gap-2 justify-between">
        <div class="inline-flex mb-2 items-center gap-1">
            <img src="https://d2tlmlryquimxf.cloudfront.net/mobimatter-assests/assets/sparks.png" alt="logo" class="w-5 h-auto" />
            <div class="inline-flex flex-col">
                <p class="text-sm font-semibold">{{ @$operator['title'] }}</p>
                <small class="text-xs text-gray-600 leading-tight">{{ @$operator['esim_type'] }}</small>
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
        @if( !empty($operator['other_info']) )
            <p class="text-xs">{{ $operator['other_info'] }}</p>
        @elseif( !empty($operator['info'][0]) )
            <p class="text-xs">{{ $operator['info'][0] }}</p>
        @elseif( !empty($operator['packages'][0]['title']) )
            <p class="text-xs">{{ $operator['packages'][0]['title'] }}</p>
        @endif
    </div>
    <div class="">
        @if(!empty( $countrySlug ))
            <x-button href="{{ route('sims.show', ['countrySlug' => $countrySlug]) }}" class="w-full">View Offers</x-button>
        @endif
    </div>
</div>