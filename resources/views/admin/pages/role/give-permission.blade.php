<x-admin-app-layout>
    <div class="grid place-items-center my-10">
        <div
            class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4">
                <div class="">Give Permission</div>
                <div></div>
                <div class=" justify-self-end">
                    <a href="{{ route('admin.role.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid place-items-center">
        <div
            class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
            <form method="POST" action="{{ route('admin.role.store-permission', $role->id) }}">
                @csrf
                @method('put')

                <!-- Name -->
                <div class="mb-5">
                    <x-input-label for="permissions" :value="__('Permissions')" />

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input id="permission-{{ $permission->id }}" type="checkbox" name="permissions[]"
                                    value="{{ $permission->name }}"
                                    class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                    {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                                <label for="permission-{{ $permission->id }}"
                                    class="ml-3 block text-sm text-gray-900 dark:text-gray-300">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Give Permission') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-app-layout>
