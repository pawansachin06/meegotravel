<x-admin-layout>
    <div class="lg:container px-3 py-3">

        @if( auth()->user()->isAdmin() )
            <div class="flex flex-wrap gap-2">
                <form action="{{ route('artisan.command') }}" class="artisan-command-form">
                    <input type="hidden" name="command" value="all-cache-clear" />
                    <x-button type="submit" data-js="artisan-command-form-btn">Clear all cache</x-button>
                </form>
                <form action="{{ route('artisan.command') }}" class="artisan-command-form">
                    <input type="hidden" name="command" value="cache-clear" />
                    <x-button type="submit" data-js="artisan-command-form-btn">Clear cache</x-button>
                </form>
            </div>
        @endif

        Info cards will be here
    </div>
    <x-slot name="scripts">
        <script defer src="/js/artisan.js?v={{ config('app.version') }}"></script>
    </x-slot>
</x-admin-layout>