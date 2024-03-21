<x-app-layout>
    <x-page-banner :$breadcrumbs title="Blog" />
    <div class="container px-3 py-4">
        <div class="flex flex-wrap lg:flex-row-reverse -mx-3 px-1 py-3">
            <div class="w-full lg:w-8/12 px-2">
                <div class="px-3 py-3 mb-2 shadow rounded bg-white">
                    <h1 class="text-xl mb-3 font-semibold">Search results for:</h1>
                    <form id="blog-search-form" action="">
                        <div class="flex border bg-gray-100 rounded overflow-hidden focus-within:border-primary">
                            <input type="text" name="s" value="{{ $keyword }}" placeholder="Type keyword here..." id="blog-search-el" autocomplete="off" spellcheck="false" class="grow shadow-inner caret-primary bg-transparent border-0 rounded-l focus:outline-none focus:ring-transparent" />
                            <button type="button" id="blog-search-clear-btn" class="{{ !empty($keyword) ? '' : 'hidden' }} flex-none inline-flex px-2 py-2 justify-center items-center bg-gray-300 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" height="16" width="12" fill="currentColor" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                            </button>
                            <button type="submit" id="blog-search-submit-btn" class="flex-none inline-flex px-2 py-2 justify-center items-center bg-primary-500 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" height="16" width="14" fill="currentColor" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                            </button>
                        </div>
                    </form>
                </div>

                @if(!empty($items) && count($items))
                    <div class="flex flex-wrap -mx-2 mb-3">
                        @foreach($items as $key => $item)
                            <div class="w-full sm:w-6/12 px-2 py-2">
                                <x-articles.card :item="$item" />
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