<x-admin-layout>
    <div class="py-3">
        <div class="lg:container px-3">
            <div class="mb-3 flex flex-wrap justify-between items-center">
                <div class="">
                    <h1 class="text-2xl font-semibold">Recharges</h1>
                </div>
            </div>
        </div>
        <div class="lg:container">
            <div class="overflow-x-auto px-3 rounded">
                <table class="w-full bg-white">
                    <thead>
                        <tr class="border-b">
                            <th class="px-3 py-2 text-start w-20">S No.</th>
                            <th class="px-3 py-2 text-start">My Refereers</th>
                            <th class="px-3 py-2 text-start">Commission</th>
                            <th class="px-3 py-2 text-start">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < 10; $i++)
                            <tr class="border-b">
                                <td class="px-3 py-2 text-sm">{{ $i + 1 }}</td>
                                <td class="px-3 py-2">Customer {{ $i + 1 }}</td>
                                <td class="px-3 py-2">USD {{ $i + 1 }}</td>
                                <td class="px-3 py-2">USD {{ $i + 1 }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>