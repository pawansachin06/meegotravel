<x-app-layout>
    <x-page-banner :$breadcrumbs title="{{ $item->name }}" />
    <div class="container px-3 py-4">
        <div class="flex flex-wrap lg:flex-row-reverse -mx-3 px-1 py-3">
            <div class="w-full lg:w-8/12 px-2">
                <div class="px-3 py-3 mb-2 shadow rounded bg-white">
                    <h1 class="text-xl mb-3 font-semibold">{{ $item->name }}</h1>
                    {{ $item->excerpt }}
                </div>

                @if(!empty($related_items) && count($related_items))
                    <div class="flex flex-wrap -mx-2 mb-3">
                        @foreach($related_items as $key => $related_item)
                            <div class="w-full sm:w-6/12 px-2 py-2">
                                <x-articles.card :item="$related_item" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="px-3 py-3 text-center">
                        No articles found
                    </div>
                @endif
            </div>
            <div class="w-full lg:w-4/12 px-2">
                <div class="sticky top-16">
                    @if( !empty($categories) && count($categories) )
                        <div class="mb-3 shadow rounded-md bg-white">
                            <div class="px-3 py-3 border-b">
                                <h3 class="text-xl font-semibold">Categories</h3>
                            </div>
                            <div class="flex flex-col">
                                @foreach($categories as $category)
                                    <a href="{{ $category->getPermalink() }}" class="inline-flex truncate px-3 py-2 border-b w-full justify-between gap-2 hover:text-primary-500 hover:bg-primary-50">
                                        <span class="inline-block truncate">{{ $category->name }}</span>
                                        <span>{{ $category->articles_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- <div class="mb-3 shadow rounded-md bg-white">
                        <div class="px-3 py-3 border-b">
                            <h3 class="text-xl font-semibold">Tags</h3>
                        </div>
                        <div class="flex px-3 py-2 flex-wrap gap-2">
                            <a href="" class="inline-flex px-3 py-2 gap-2 text-sm border rounded-md hover:text-primary-500 hover:bg-primary-50">
                                <span>Category 1</span><span>(23)</span>
                            </a>
                            <a href="" class="inline-flex px-3 py-2 gap-2 text-sm border rounded-md hover:text-primary-500 hover:bg-primary-50">
                                <span>Category 1</span><span>(23)</span>
                            </a>
                            <a href="" class="inline-flex px-3 py-2 gap-2 text-sm border rounded-md hover:text-primary-500 hover:bg-primary-50">
                                <span>Category 1</span><span>(23)</span>
                            </a>

                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>