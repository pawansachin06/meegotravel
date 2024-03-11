<a href="{{ route('troubleshoot') }}" class="flex px-2 py-2 gap-2 justify-between items-center rounded shadow bg-white">
    <span class="inline-flex gap-2">
        @if( !empty($icon) ) {{ $icon }} @endif
        <span>{{ $slot }}</span>
    </span>
    <span class="flex-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" width="24" height="24" fill="currentColor" viewBox="0 -960 960 960"><path d="M579-480 285-774q-15-15-14.5-35.5T286-845q15-15 35.5-15t35.5 15l307 308q12 12 18 27t6 30q0 15-6 30t-18 27L356-115q-15 15-35 14.5T286-116q-15-15-15-35.5t15-35.5l293-293Z"/></svg>
    </span>
</a>