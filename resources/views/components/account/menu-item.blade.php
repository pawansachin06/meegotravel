<a href="{{ route('troubleshoot') }}" class="flex px-2 py-2 gap-2 justify-between items-center rounded shadow bg-white">
    <span class="inline-flex gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" width="24" height="24" fill="currentColor" viewBox="0 -960 960 960"><path d="M480-280q17 0 28.5-11.5T520-320v-160q0-17-11.5-28.5T480-520q-17 0-28.5 11.5T440-480v160q0 17 11.5 28.5T480-280Zm0-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 516q-7 0-13-1t-12-3q-135-45-215-166.5T160-516v-189q0-25 14.5-45t37.5-29l240-90q14-5 28-5t28 5l240 90q23 9 37.5 29t14.5 45v189q0 140-80 261.5T505-88q-6 2-12 3t-13 1Zm0-80q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z"/></svg>
        <span>{{ $slot }}</span>
    </span>
    <span class="flex-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" width="24" height="24" fill="currentColor" viewBox="0 -960 960 960"><path d="M579-480 285-774q-15-15-14.5-35.5T286-845q15-15 35.5-15t35.5 15l307 308q12 12 18 27t6 30q0 15-6 30t-18 27L356-115q-15 15-35 14.5T286-116q-15-15-15-35.5t15-35.5l293-293Z"/></svg>
    </span>
</a>