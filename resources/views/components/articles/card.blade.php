@props(['item' => null])
<a href="{{ $item->getPermalink() }}" class="inline-flex flex-col w-full px-2 py-2 rounded-md bg-white shadow">
    <span class="relative">
        <span class="relative inline-block pb-3/4 w-full">
            <img src="{{ $item->getFeaturedImage() }}" alt="image" class="absolute w-full h-full rounded object-center object-cover" />
        </span>
        <span class="absolute bottom-0 inline-block right-0 px-3">
            <span class="inline-block px-3 py-2 rounded-md bg-gray-200">{{ $item->created_at->format('d M Y') }}</span>
        </span>
    </span>
    <span class="px-3 py-2">
        <h3 class="text-xl mb-2 font-bold">{{ $item->name }}</h3>
        <p class="text-gray-600">{{ $item->getExcerpt() }}</p>
    </span>
    <span class="mt-auto flex justify-between items-center border-t mx-2 pt-3 pb-2">
        <span class="underline">Read More</span>
        <span class="inline-flex items-center gap-2">
            <img src="{{ $item->author->profile_photo_url }}https://dummyimage.com/360" alt="user" class="flex-none w-8 h-8 rounded-full" />
            <span>{{ $item->author->name }}</span>
        </span>
    </span>
</a>