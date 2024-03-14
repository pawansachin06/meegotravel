<x-admin-layout>
    <div class="lg:container px-3 py-3">
        <div class="mb-2 flex flex-wrap justify-between items-center">
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
                @if( auth()->user()->isAdmin() )
                    @if( !empty($user_roles) )
                        <div class="w-full lg:w-6/12 px-1 mb-2">
                            <div class="flex flex-col">
                                <span>Role</span>
                                <select name="role" class="rounded focus:border-primary-500 focus:ring-primary-400">
                                    @foreach($user_roles as $user_role)
                                        <option value="{{ $user_role }}" <?php echo $user_role == $item->role->value ? 'selected' : ''; ?>>{{ $user_role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if( !empty($commission_types) )
                        <div class="w-full sm:w-6/12 px-1 mb-2">
                            <div class="flex flex-col">
                                <span>Commission Type <small>(required for Reseller)</small></span>
                                <select name="commission_type" class="rounded focus:border-primary-500 focus:ring-primary-400">
                                    @foreach($commission_types as $commission_type)
                                        <option value="{{ $commission_type }}" <?php echo $commission_type == $item->commission_type->value ? 'selected' : ''; ?>>{{ $commission_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full sm:w-6/12 px-1 mb-2">
                            <div class="flex flex-col">
                                <span>Commission Value <small>(required for Reseller)</small></span>
                                <input type="number" name="commission" value="{{ $item->commission }}" class="rounded focus:border-primary-500 focus:ring-primary-400" />
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
                @endif
                <div class="w-full px-1">
                    <div data-js="app-form-status" class="hidden font-semibold hidden w-full mb-2"></div>
                    <x-button type="submit" data-js="app-form-btn">Update User</x-button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>