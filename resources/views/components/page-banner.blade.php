@props([
    'title' => '',
    'breadcrumbs' => [],
    'image' => '',
])
<div class="py-5 relative bg-primary-100">
    @if( !empty($image) )
        <img src="{{ $image }}" alt="banner" class="absolute top-0 bottom-0 left-0 right-0 w-full h-full object-center object-cover" />
        <span class="absolute block top-0 bottom-0 left-0 right-0 w-full h-full bg-primary-500/50"></span>
    @endif
    <div class="container relative px-2 py-5">
        <div class="py-5 text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl !leading-snug mb-2 font-bold">{{ $title }}</h1>
            <ul class="flex flex-wrap gap-2 justify-center">
                <li>
                    <a href="/" class="font-semibold hover:text-primary-500">Home</a>
                </li>
                @if( !empty($breadcrumbs) )
                    @foreach($breadcrumbs as $key => $item)
                        @if(!empty($item['name']))
                            <li>/</li>
                            <li>
                                <a href="{{ !empty($item['link']) ? $item['link'] : '#' }}" class="font-semibold {{ $loop->last ? 'text-primary-500' : '' }}">{{ $item['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>