<x-admin-layout tinymce="1">
    <div class="lg:container px-3 py-3">
        <div class="mb-2 flex flex-wrap justify-between items-center">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Article</h1>
            </div>
            <div class="">
                <x-button href="{{ route('articles.index') }}">Back</x-button>
            </div>
        </div>
        <form action="{{ route('articles.update', $item) }}" method="post" data-js="app-form">
            @method('PUT')
            <div class="flex flex-wrap -mx-1">
                <div class="w-full sm:w-6/12 px-1 mb-2">
                    <div class="flex flex-col">
                        <span>Name</span>
                        <input type="text" name="name" value="{{ $item->name }}" required class="rounded focus:border-primary-500 focus:ring-primary-400" />
                    </div>
                </div>
                <div class="w-full sm:w-6/12 px-1 mb-2">
                    <div class="flex flex-col">
                        <span>Slug</span>
                        <input type="text" name="slug" value="{{ $item->slug }}" class="rounded focus:border-primary-500 focus:ring-primary-400" />
                    </div>
                </div>
                <div class="w-full sm:w-6/12 px-1 mb-2">
                    <div class="flex flex-col">
                        <span>Status</span>
                        <select name="status" class="rounded focus:border-primary-500 focus:ring-primary-400">
                            <option value="DRAFT" <?php echo 'DRAFT' == $item->status ? 'selected' : ''; ?>>DRAFT</option>
                            <option value="PUBLISHED" <?php echo 'PUBLISHED' == $item->status ? 'selected' : ''; ?>>PUBLISHED</option>
                        </select>
                    </div>
                </div>
                <div class="w-full sm:w-6/12 px-1 mb-2">
                    <div class="flex flex-col">
                        <span>Order</span>
                        <input type="number" name="order" value="{{ $item->order }}" class="rounded focus:border-primary-500 focus:ring-primary-400" />
                    </div>
                </div>
                <div class="w-full px-1 mb-2">
                    <div class="flex flex-col">
                        <span>Excerpt</span>
                        <textarea name="excerpt" rows="2" class="rounded focus:border-primary-500 focus:ring-primary-400">{{ $item->excerpt }}</textarea>
                    </div>
                </div>
                @if( !empty($categories) && count($categories) )
                    <div class="w-full px-1 mb-2">
                        <div class="">
                            <span>Cateogies</span>
                            <div class="gap-3 w-full flex flex-wrap overflow-y-auto" style="max-height:200px;">
                                <?php $itemCategoriesArr = $item->categories->pluck('id')->toArray(['id']); ?>
                                @foreach($categories as $category)
                                    <label class="flex gap-1 py-1 cursor-pointer items-center">
                                        <input type="checkbox" name="category[]" value="{{ $category->id }}" <?php echo in_array($category->id, $itemCategoriesArr) ? 'checked' : ''; ?> class="w-4 h-4 rounded text-primary focus:ring-primary" />
                                        <span class="text-sm select-none">{{ $category->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="w-full px-1 mb-2">
                    <div class="flex flex-col">
                        <span>Content</span>
                        <textarea id="my-tinymce-editor" rows="1" class="hidden">{{ $item->content }}</textarea>
                    </div>
                </div>
                <div class="w-full px-1">
                    <div data-js="app-form-status" class="hidden font-semibold hidden w-full mb-2"></div>
                    <x-button type="submit" data-js="app-form-btn">Update Article</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>