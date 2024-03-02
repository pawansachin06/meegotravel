@props([
    'href' => '',
    'active' => false,
])
<a href="{{ $href }}" class="{{ $active ? 'bg-primary-500 text-white' : 'hover:bg-primary-100' }} block px-3 py-2 w-full border-b">
    {{ $slot }}
</a>