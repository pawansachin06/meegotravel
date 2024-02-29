@props([
    'href' => '',
    'baseClasses' => 'select-none inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-800 border border-transparent rounded font-semibold text-white tracking-wide hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none transition ease-in-out duration-150',
])

@if( !empty($href) )
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses]) }}>
        <span data-js="btn-text">{{ $slot }}</span>
        <span data-js="btn-loader" class="hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="animate-spin w-4 h-4" viewBox="0 0 24 24" width="24" height="24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $baseClasses]) }}>
        <span data-js="btn-text">{{ $slot }}</span>
        <span data-js="btn-loader" class="hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="animate-spin w-4 h-4" viewBox="0 0 24 24" width="24" height="24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
    </button>
@endif
