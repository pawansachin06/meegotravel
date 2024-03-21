<div {{ $attributes->merge(['class' => 'px-4 py-4 bg-white rounded-md border shadow-sm']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    {{ $content }}
</div>
