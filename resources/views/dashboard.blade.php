<x-app-layout>
    <div class="container px-3 py-4">
        <div class="flex flex-wrap -mx-2">
            <div class="w-full md:w-5/12 lg:w-4/12 xl:w-3/12 px-2 mb-4">
                <x-account.sidebar />
            </div>
            <div class="w-full md:w-7/12 lg:w-8/12 xl:w-9/12 px-2 mb-4">
                <div class="flex flex-wrap">
                    @if( auth()->user()->isAdminOrReseller() )
                        <div class="w-full lg:w-6/12 xl:w-4/12 px-1 mb-2">
                            <x-account.menu-item href="{{ route('dashboard.overview') }}">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-gray-700" width="24" height="24" viewBox="0 -960 960 960"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
                                </x-slot>
                                Dashboard
                            </x-account.menu-item>
                        </div>
                    @endif
                    <div class="w-full lg:w-6/12 xl:w-4/12 px-1 mb-2">
                        <x-account.menu-item href="{{ route('profile.show') }}">
                            <x-slot name="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" width="24" height="24" fill="currentColor" viewBox="0 -960 960 960">
                                    <path d="M480-280q17 0 28.5-11.5T520-320v-160q0-17-11.5-28.5T480-520q-17 0-28.5 11.5T440-480v160q0 17 11.5 28.5T480-280Zm0-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 516q-7 0-13-1t-12-3q-135-45-215-166.5T160-516v-189q0-25 14.5-45t37.5-29l240-90q14-5 28-5t28 5l240 90q23 9 37.5 29t14.5 45v189q0 140-80 261.5T505-88q-6 2-12 3t-13 1Zm0-80q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z" />
                                </svg>
                            </x-slot>
                            Profile
                        </x-account.menu-item>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-4/12 px-1 mb-2">
                        <x-account.menu-item href="{{ route('troubleshoot') }}">
                            <x-slot name="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" width="24" height="24" fill="currentColor" viewBox="0 -960 960 960">
                                    <path d="M480-280q17 0 28.5-11.5T520-320v-160q0-17-11.5-28.5T480-520q-17 0-28.5 11.5T440-480v160q0 17 11.5 28.5T480-280Zm0-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 516q-7 0-13-1t-12-3q-135-45-215-166.5T160-516v-189q0-25 14.5-45t37.5-29l240-90q14-5 28-5t28 5l240 90q23 9 37.5 29t14.5 45v189q0 140-80 261.5T505-88q-6 2-12 3t-13 1Zm0-80q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z" />
                                </svg>
                            </x-slot>
                            Help & Support
                        </x-account.menu-item>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-4/12 px-1 mb-2">
                        <x-account.menu-item href="{{ route('troubleshoot') }}">
                            <x-slot name="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" width="24" height="24" fill="currentColor" viewBox="0 -960 960 960">
                                    <path d="M478-240q21 0 35.5-14.5T528-290q0-21-14.5-35.5T478-340q-21 0-35.5 14.5T428-290q0 21 14.5 35.5T478-240Zm2 160q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Zm4-172q25 0 43.5 16t18.5 40q0 22-13.5 39T502-525q-23 20-40.5 44T444-427q0 14 10.5 23.5T479-394q15 0 25.5-10t13.5-25q4-21 18-37.5t30-31.5q23-22 39.5-48t16.5-58q0-51-41.5-83.5T484-720q-38 0-72.5 16T359-655q-7 12-4.5 25.5T368-609q14 8 29 5t25-17q11-15 27.5-23t34.5-8Z" />
                                </svg>
                            </x-slot>
                            FAQ
                        </x-account.menu-item>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-4/12 px-1 mb-2">
                        <x-account.menu-item href="{{ route('troubleshoot') }}">
                            <x-slot name="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" width="24" height="24" fill="currentColor" viewBox="0 -960 960 960">
                                    <path d="M200-640v440h560v-440H640v255q0 23-19 34.5t-39 1.5l-102-51-102 51q-20 10-39-1.5T320-385v-255H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm184 80v190l80-40 80 40v-190H400Zm-200 0h560-560Z" />
                                </svg>
                            </x-slot>
                            Order History
                        </x-account.menu-item>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-4/12 px-1 mb-2">
                        <x-account.menu-item href="{{ route('troubleshoot') }}">
                            <x-slot name="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960">
                                    <path d="M320-200q17 0 28.5-11.5T360-240q0-17-11.5-28.5T320-280q-17 0-28.5 11.5T280-240q0 17 11.5 28.5T320-200Zm0-160q17 0 28.5-11.5T360-400v-80q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480v80q0 17 11.5 28.5T320-360Zm160 160q17 0 28.5-11.5T520-240v-80q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320v80q0 17 11.5 28.5T480-200Zm0-240q17 0 28.5-11.5T520-480q0-17-11.5-28.5T480-520q-17 0-28.5 11.5T440-480q0 17 11.5 28.5T480-440Zm160 240q17 0 28.5-11.5T680-240q0-17-11.5-28.5T640-280q-17 0-28.5 11.5T600-240q0 17 11.5 28.5T640-200Zm0-160q17 0 28.5-11.5T680-400v-80q0-17-11.5-28.5T640-520q-17 0-28.5 11.5T600-480v80q0 17 11.5 28.5T640-360ZM240-80q-33 0-56.5-23.5T160-160v-447q0-16 6-30.5t17-25.5l194-194q11-11 25.5-17t30.5-6h287q33 0 56.5 23.5T800-800v640q0 33-23.5 56.5T720-80H240Zm0-80h480v-640H434L240-606v446Zm0 0h480-480Z" />
                                </svg>
                            </x-slot>
                            My eSIMs
                        </x-account.menu-item>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>