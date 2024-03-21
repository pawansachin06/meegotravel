<div class="mb-3">
    <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
    <p class="text-sm text-gray-600">
        {{ $description }}
    </p>
    @if( !empty($aside) )
        {{ $aside }}
    @endif
</div>
