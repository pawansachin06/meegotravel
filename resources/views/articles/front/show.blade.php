<x-app-layout>
    <x-page-banner :$breadcrumbs title="Blog Details" />
    <div class="container px-3 py-4">
        <div class="flex flex-wrap -mx-3 px-1 py-3">
            <div class="w-full lg:w-8/12 px-2">
                <div class="mb-2">
                    <img src="{{ $item->getFeaturedImage() }}" alt="{{ $item->slug }}" class="w-full h-auto mb-3 rounded-md" />
                    <div class="flex flex-wrap justify-between gap-4 mb-3 text-sm text-gray-600">
                        <div class="inline-flex gap-2 items-center">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 text-primary-500 bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/></svg>
                            </div>
                            <div class="">
                                {{ $item->author->name }}
                            </div>
                        </div>
                        <div class="inline-flex gap-2 items-center">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 text-primary-500 bi bi-calendar-week" viewBox="0 0 16 16"><path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/></svg>
                            </div>
                            <div class="">
                                {{ $item->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                    <h1 class="text-2xl sm:text-3xl mb-3 font-bold text-gray-800">{{ $item->name }}</h1>
                    <div class="prose">
                        {!! $item->content !!}
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-4/12 px-2">
                <div class="sticky top-16">
                    <div class="mb-3 px-3 py-3 shadow rounded-md bg-white">
                        <form id="blog-search-form" action="{{ route('articles.front.index') }}">
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

                    @if( !empty($categories) && count($categories) )
                        <div class="mb-3 shadow rounded-md bg-white">
                            <div class="px-3 py-3 border-b">
                                <h3 class="text-xl font-semibold">Categories</h3>
                            </div>
                            <div class="flex flex-col">
                                @foreach($categories as $category)
                                    <a href="{{ $category->getPermalink() }}" class="inline-flex truncate px-3 py-2 {{ $loop->last ? '' : 'border-b' }} w-full justify-between gap-2 hover:text-primary-500 hover:bg-primary-50">
                                        <span class="inline-block truncate">{{ $category->name }}</span>
                                        <span>{{ $category->articles_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if( !empty($related_items) && count($related_items) )
                        <div class="mb-3 shadow rounded-md bg-white">
                            <div class="px-3 py-3 border-b">
                                <h3 class="text-xl font-semibold">Related Articles</h3>
                            </div>
                            <div class="flex flex-col">
                                @foreach($related_items as $related_item)
                                    <a href="{{ $related_item->getPermalink() }}" class="inline-flex truncate px-3 py-2 {{ $loop->last ? '' : 'border-b' }} w-full justify-between gap-2 hover:text-primary-500 hover:bg-primary-50">
                                        <span class="inline-block truncate">{{ $related_item->name }}</span>
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