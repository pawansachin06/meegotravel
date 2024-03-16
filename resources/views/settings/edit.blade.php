<x-admin-layout>
    <div class="lg:container px-3 py-3">
        <div class="mb-2 flex flex-wrap justify-between items-center">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Setting</h1>
            </div>
            <div class="">
                <x-button href="{{ route('settings.index') }}">Back</x-button>
            </div>
        </div>
        <form action="{{ route('settings.update', $item) }}" method="post" data-js="app-form">
            @method('PUT')
            <div class="flex flex-wrap -mx-1">
                <div class="w-full sm:w-6/12 px-1 mb-2">
                    <div class="flex flex-col">
                        <span>Key</span>
                        <input type="text" name="key" value="{{ $item->key }}" required class="rounded focus:border-primary-500 focus:ring-primary-400" />
                    </div>
                </div>
                <div class="w-full px-1 mb-2">
                    <div class="flex flex-col">
                        <span>Value</span>
                        <textarea name="value" rows="4" class="rounded focus:border-primary-500 focus:ring-primary-400">{{ $item->value }}</textarea>
                    </div>
                </div>
                <div class="w-full px-1">
                    <div data-js="app-form-status" class="hidden font-semibold hidden w-full mb-2"></div>
                    <x-button type="submit" data-js="app-form-btn">Update Setting</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>