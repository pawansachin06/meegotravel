@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <div class="px-4 py-4 bg-white rounded-md border shadow-sm {{ isset($actions) ? '' : '' }}">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
        <form wire:submit="{{ $submit }}">
            <div class="">
                <div class="">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end text-end">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
