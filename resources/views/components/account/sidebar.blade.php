<div class="rounded-lg shadow-sm overflow-hidden bg-white">
    <div class="flex gap-2 px-2 py-2 border-b">
        <div>
            <div class="relative w-16 h-16">
                <div class="fade-away absolute flex items-center justify-center left-0 right-0 top-0 bottom-0 w-full h-full">
                    <x-loader class="h-8 w-8" />
                </div>
                <picture class="relative">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="profile image" class="w-full h-full object-center object-cover rounded-md" />
                </picture>
            </div>
        </div>
        <div class="truncate">
            <p class="text-gray-600">{{ __('Welcome back,') }}</p>
            <p class="text-xl leading-none mb-1 truncate font-semibold">{{ auth()->user()->name }} {{ auth()->user()->lastname }}</p>
            <small class="text-sm text-gray-500 block truncate">{{ auth()->user()->email }}</small>
        </div>
    </div>
    <div>

        <hr />
        <form method="POST" action="{{ route('logout') }}" class="block w-full">
            @csrf
            <button type="submit" class="text-left text-red-600 block w-full px-3 py-3 leading-none hover:bg-gray-50">{{ __('Log out') }}</button>
        </form>
    </div>
</div>