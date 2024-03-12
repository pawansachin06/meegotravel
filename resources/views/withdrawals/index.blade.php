<x-admin-layout>
    <div class="py-3">
        <div class="lg:container px-3">
            <div class="mb-3 flex flex-wrap justify-between items-center">
                <div class="">
                    <h1 class="text-2xl font-semibold">Request Withdrawal</h1>
                </div>
            </div>
        </div>
        <div class="lg:container">
            <div class="overflow-x-auto px-3 rounded">
                <table class="w-full bg-white">
                    <thead>
                        <tr class="border-b">
                            <th class="px-3 py-2 text-start w-20">S No.</th>
                            <th class="px-3 py-2 text-start">Amount</th>
                            <th class="px-3 py-2 text-start">Status</th>
                            <th class="px-3 py-2 text-start">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < 10; $i++)
                            <tr class="border-b">
                                <td class="px-3 py-2 text-sm">{{ $i + 1 }}</td>
                                <td class="px-3 py-2">1</td>
                                <td class="px-3 py-2">2</td>
                                <td class="px-3 py-2">3</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>