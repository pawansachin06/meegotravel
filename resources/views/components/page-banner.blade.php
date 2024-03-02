@props([
    'title' => '',
    'breadcrumbs' => [],
])
<div class="py-5 bg-primary-100">
    <div class="container px-2 py-5">
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