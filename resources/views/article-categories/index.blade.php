<x-admin-layout sweetalert="1">
    <div class="py-3">
        <div class="lg:container px-3">
            <div class="mb-3 flex flex-wrap justify-between items-center">
                <div class="">
                    <h1 class="text-2xl font-semibold">Article Categories</h1>
                </div>
                <div class="">
                    <form action="{{ route('article-categories.store') }}" method="post" data-js="app-create-form">
                        <x-button data-js="app-form-btn" type="submit">Create</x-button>
                    </form>
                </div>
            </div>
        </div>
        <div class="lg:container">
            @if(!empty($items) && count($items))
                <div class="overflow-x-auto px-3 rounded">
                    <table class="w-full bg-white">
                        <thead>
                            <tr class="border-b">
                                <th class="px-3 py-2 text-start w-20">S No.</th>
                                <th class="px-3 py-2 text-start">Name</th>
                                <th class="px-3 py-2 text-start">Status</th>
                                <th class="px-3 py-2 text-start"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key => $item)
                                <tr class="border-b">
                                    <td class="px-3 py-2 text-sm">
                                        {{ (($perPage * ($items->currentPage() - 1)) + ($key + 1)) }}
                                    </td>
                                    <td class="px-3 py-2">
                                        {{ $item->name }}
                                        <div>
                                            <small class="text-gray-500">{{ $item->slug }}</small>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">{{ $item->status }}</td>
                                    <td class="px-3 py-2">
                                        <div class="inline-flex flex flex-wrap gap-1 justify-end">
                                            <x-button href="{{ route('article-categories.edit', $item->id) }}">Edit</x-button>
                                            <form action="{{ route('article-categories.destroy', $item->id) }}" method="post" data-js="app-delete-form">
                                                @method('DELETE')
                                                <x-button type="submit">Delete</x-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $items->onEachSide(2)->links() }}
            @else
                <div class="px-3">
                    <div class="px-2 py-2 rounded border shadow-sm bg-white">
                        <p class="text-center">No records found</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>