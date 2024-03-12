<x-admin-layout>
    <div class="lg:container px-3 py-3">
        <div class="mb-2 flex flex-wrap justify-between items-center">
            <div class="">
                <h1 class="text-2xl font-semibold">New eSIMs</h1>
            </div>
        </div>

        @for($i = 0; $i < 10; $i++)
                <div class="mb-2 px-2 py-2 flex flex-wrap justify-between rounded border shadow-sm bg-white">
                    <div class="w-full lg:w-7/12 flex gap-2 truncate">
                        <div class="flex-none">
                            <picture>
                                <img src="https://ui-avatars.com/api/?name=U&color=7F9CF5&background=EBF4FF" alt="image" class="mb-1 w-14 h-14 rounded" />
                            </picture>
                        </div>
                        <div class="flex flex-col truncate">
                            <p class="leading-none font-semibold truncate">User Name</p>
                            <small class="block truncate text-gray-600">
                                useremail@test.com <br> 11 Mar 2024
                            </small>
                        </div>
                    </div>
                    <div class="w-full lg:w-5/12 inline-flex items-center flex-wrap justify-between gap-1 leading-tight">
                        <span class="text-gray-700">Commissioin: $45</span>
                        <div class="inline-flex flex flex-wrap gap-1 justify-end">
                            Total: $45
                        </div>
                    </div>
                </div>
        @endfor

    </div>
</x-admin-layout>