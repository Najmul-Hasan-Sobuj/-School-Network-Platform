<x-admin-app-layout>
    <div class="grid place-items-center my-10">
        <div
            class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4">
                <div class="">Edit Category</div>
                <div></div>
                <div class=" justify-self-end">
                    <a href="{{ route('admin.category.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid place-items-center">
        <div
            class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
            <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="name" :value="__(' Name ')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="$category->name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <x-input-label for="status" :value="__('Status')" />
                    <select id="status" class="form-input w-full text-gray-800 rounded-md bg-gray-50 border border-gray-300 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 p-2 transition duration-200 ease-in-out shadow-sm hover:border-blue-400"
                        name="status" required>
                        <option value="1" @if ($category->status == 1) selected @endif>Active</option>
                        <option value="0" @if ($category->status == 0) selected @endif>Inactive</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-app-layout>
