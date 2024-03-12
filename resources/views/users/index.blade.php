<x-admin-layout sweetalert="1">
    <div class="lg:container px-3 py-3">
        <div class="mb-2 flex flex-wrap justify-between items-center">
            <div class="">
                <h1 class="text-2xl font-semibold">Users</h1>
            </div>
            <div class="">
                @if(
                    auth()->user()->role == \App\Enums\UserRoleEnum::ADMIN
                    || auth()->user()->role == \App\Enums\UserRoleEnum::RESELLER
                )
                    <x-button href="{{ route('users.create') }}">Create</x-button>
                @endif
            </div>
        </div>
        @if( !empty($items) && count($items) )
            @foreach($items as $item)
                <div class="mb-2 px-2 py-2 flex flex-wrap justify-between rounded border shadow-sm bg-white">
                    <div class="w-full lg:w-7/12 flex gap-2 truncate">
                        <div class="flex-none">
                            <picture>
                                <img src="{{ $item->profilePhotoUrl }}" alt="image" class="mb-1 w-14 h-14 rounded" />
                            </picture>
                            @if( $item->role == \App\Enums\UserRoleEnum::ADMIN )
                                <span class="inline-flex items-center rounded-md bg-red-50 px-1 py-1 leading-none text-xs font-medium text-red-700 border border-red-600">
                                    {{ $item->role }}
                                </span>
                            @elseif( $item->role == \App\Enums\UserRoleEnum::RESELLER )
                                <span class="inline-flex items-center rounded-md bg-green-50 px-1 py-1 leading-none text-xs font-medium text-green-700 border border-green-600">
                                    SELLER
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-1 py-1 leading-none text-xs font-medium text-gray-700 border border-gray-600">
                                    {{ $item->role }}
                                </span>
                            @endif
                        </div>
                        <div class="flex flex-col truncate">
                            <p class="leading-none font-semibold truncate">{{ $item->name }}</p>
                            <small class="block truncate text-gray-600">
                                {{ $item->email }} <br> {{ $item->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                    <div class="w-full lg:w-5/12 inline-flex items-center flex-wrap justify-between gap-1">
                        <span class="text-gray-700">{{ $item->unique_code }}</span>
                        <div class="inline-flex flex flex-wrap gap-1 justify-end">
                            <x-button href="{{ route('users.edit', $item->id) }}">Edit</x-button>
                            <form action="{{ route('users.destroy', $item->id) }}" method="post" data-js="app-delete-form">
                                @method('DELETE')
                                <x-button type="submit">Delete</x-button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $items->onEachSide(2)->links() }}
        @else
            <div class="px-2 py-2 rounded border shadow-sm bg-white">
                <p class="text-center">No records found</p>
            </div>
        @endif
    </div>
</x-admin-layout>