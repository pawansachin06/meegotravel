@props([
    'href' => '',
    'active' => false,
])
<li>
    <a href="{{ $href }}" class="{{ $active ? 'text-primary-500' : '' }} inline-block px-1 py-3 hover:text-primary-500 focus:outline-primary-500 focus:outline-offset-2">{{ $slot }}</a>
</li>