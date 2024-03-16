<x-admin-layout sweetalert="1">
    <div class="py-3">
        <div class="lg:container px-3">
            <div class="mb-3 flex flex-wrap justify-between items-center">
                <div class="">
                    <h1 class="text-2xl font-semibold">Switches</h1>
                </div>
            </div>
        </div>
        <div class="lg:container">
            @if(!empty($items) && count($items))
                <div class="overflow-x-auto px-3 rounded">
                    <table class="w-full bg-white">
                        <thead>
                            <tr class="border-b">
                                <th class="px-3 py-2 text-start">Key</th>
                                <th class="px-3 py-2 text-start">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key => $item)
                                <tr class="border-b">
                                    <td class="px-3 py-2">
                                        {{ $item['key'] }}
                                    </td>
                                    <td class="px-3 py-2">
                                        <div class="relative">
                                            <div class="inline-flex flex flex-wrap gap-1 justify-end">
                                                @if(!empty($item['values']))
                                                    <select name="{{ $item['key'] }}" data-id="{{ $item['id'] }}" data-loader="loader-{{ $item['id'] }}" data-js="select-switch" data-route="{{ route('switches.save') }}" class="rounded focus:border-primary-500 focus:ring-primary-400">
                                                        <option hidden value="">Select option</option>
                                                        @foreach($item['values']  as $option)
                                                            <option value="{{ $option }}" <?php echo $item['value'] == $option ? 'selected' : ''; ?>>{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                            <div id="loader-{{ $item['id'] }}" class="hidden absolute inline-flex items-center right-0 top-0 bottom-0">
                                                <x-loader />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="px-3">
                    <div class="px-2 py-2 rounded border shadow-sm bg-white">
                        <p class="text-center">No records found</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-slot name="scripts">
        <script defer src="/js/switches.js?v={{ config('app.version') }}"></script>
    </x-slot>
</x-admin-layout>