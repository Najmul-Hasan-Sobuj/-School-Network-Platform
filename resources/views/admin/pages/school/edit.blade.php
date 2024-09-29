<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Edit School</h1>
            <a href="{{ route('admin.school.index') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Back
            </a>
        </div>

        <form action="{{ route('admin.school.update', $school->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <!-- School Name -->
                <div>
                    <label for="name" class="block text-gray-700">School Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        value="{{ old('name', $school->name) }}" required>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-gray-700">Address</label>
                    <input type="text" name="address" id="address"
                        class="w-full mt-1 p-2 border
                        border-gray-300 rounded-lg"
                        value="{{ old('address', $school->address) }}" required>
                    @error('address')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <small class="text-gray-600">e.g., 123 Main St., Anytown, USA</small>
                </div>
                <!-- Country -->
                <div>
                    <label for="country" class="block text-gray-700">Country</label>
                    <input type="text" name="country" id="country"
                        class="w-full mt-1 p-2 border
                        border-gray-300 rounded-lg"
                        value="{{ old('country', $school->country) }}" required>
                    @error('country')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <small class="text-gray-600">e.g., United States</small>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Update
                        Reading</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
