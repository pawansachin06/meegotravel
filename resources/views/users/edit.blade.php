<x-app-layout>
    <div class="container px-3 py-4">
        <div class="flex flex-wrap -mx-2">
            <div class="w-full sm:w-6/12 md:w-5/12 lg:w-4/12 xl:w-3/12 px-2 mb-4">
                <x-account.sidebar />
            </div>
            <div class="w-full sm:w-6/12 md:w-7/12 lg:w-8/12 xl:w-9/12 px-2 mb-4">
                <div class="mb-2 px-1 flex flex-wrap justify-between items-center">
                    <div class="">
                        <h1 class="text-2xl font-semibold">Edit User</h1>
                    </div>
                    <div class="">
                        <x-button href="{{ route('users.index') }}">Back</x-button>
                    </div>
                </div>
                <form action="{{ route('users.update', $item) }}" method="post" data-js="app-form">
                    @method('PUT')
                    <div class="flex flex-wrap -mx-1">
                        <div class="w-full lg:w-6/12 px-1 mb-2">
                            <div class="flex flex-col">
                                <span>Name</span>
                                <input type="text" name="name" value="{{ $item->name }}" required class="rounded focus:border-primary-500 focus:ring-primary-400" />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-1 mb-2">
                            <div class="flex flex-col">
                                <span>Surname</span>
                                <input type="text" name="lastname" value="{{ $item->lastname }}" class="rounded focus:border-primary-500 focus:ring-primary-400" />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-1 mb-2">
                            <div class="flex flex-col">
                                <span>Email</span>
                                <input type="email" name="email" value="{{ $item->email }}" required class="rounded focus:border-primary-500 focus:ring-primary-400" />
                            </div>
                        </div>
                        @if( auth()->user()->role == \App\Enums\UserRoleEnum::ADMIN )
                            <div class="w-full lg:w-6/12 px-1 mb-2">
                                <div class="flex flex-col">
                                    <span>Role</span>
                                    <select name="role" class="rounded focus:border-primary-500 focus:ring-primary-400">
                                        <option value="{{ \App\Enums\UserRoleEnum::ADMIN }}" <?php echo \App\Enums\UserRoleEnum::ADMIN == $item->role ? 'selected' : ''; ?>>Admin</option>
                                        <option value="{{ \App\Enums\UserRoleEnum::RESELLER }}" <?php echo \App\Enums\UserRoleEnum::RESELLER == $item->role ? 'selected' : ''; ?>>Reseller</option>
                                        <option value="{{ \App\Enums\UserRoleEnum::USER }}" <?php echo \App\Enums\UserRoleEnum::USER == $item->role ? 'selected' : ''; ?>>User</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="w-full lg:w-6/12 px-1 mb-2">
                            <div class="flex flex-col">
                                <span>Unique Code</span>
                                <input type="text" name="unique_code" value="{{ $item->unique_code }}" class="rounded focus:border-primary-500 focus:ring-primary-400" />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-1 mb-2">
                            <div class="flex flex-col">
                                <span>Referral Code</span>
                                <input type="text" name="referral_code" value="{{ $item->referral_code }}" class="rounded focus:border-primary-500 focus:ring-primary-400" />
                            </div>
                        </div>
                        <div class="w-full px-1">
                            <div data-js="app-form-status" class="hidden font-semibold hidden w-full mb-2"></div>
                            <x-button type="submit" data-js="app-form-btn">Update User</x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>