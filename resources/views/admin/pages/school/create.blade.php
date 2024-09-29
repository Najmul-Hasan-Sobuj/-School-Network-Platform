<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-semibold text-gray-500">Create New School</h1>
        </div>

        <form action="{{ route('admin.school.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <!-- School Name -->
                <div>
                    <label for="name" class="block text-gray-700">School Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-gray-700">Address</label>
                    <input type="text" name="address" id="address"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('address') }}" required>
                    @error('address')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Country -->
                <div>
                    <label for="country" class="block text-gray-700">Country</label>
                    <input type="text" name="country" id="country"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('country') }}" required>
                    @error('country')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Create
                        School</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
