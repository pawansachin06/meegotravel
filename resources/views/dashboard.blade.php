<x-app-layout>
    <div class="lg:container px-3 py-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full sm:w-6/12 px-2 mb-4">
                    <x-account.sidebar />
                </div>
                <div class="w-full sm:w-6/12 px-2 mb-4">
                    <div class="mb-2">
                        <x-account.menu-item href="{{ route('troubleshoot') }}">Help & Support</x-account.menu-item>
                    </div>
                    <div class="mb-2">
                        <x-account.menu-item href="{{ route('troubleshoot') }}">FAQ</x-account.menu-item>
                    </div>
                    <div class="mb-2">
                        <x-account.menu-item href="{{ route('troubleshoot') }}">Order History</x-account.menu-item>
                    </div>
                    <div class="mb-2">
                        <x-account.menu-item href="{{ route('troubleshoot') }}">My eSIMs</x-account.menu-item>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
