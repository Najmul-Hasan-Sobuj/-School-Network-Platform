<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-semibold text-gray-500">Create New Reading</h1>
        </div>

        <form action="{{ route('admin.reading.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <!-- Reading Title -->
                <div>
                    <label for="user_id" class="block text-gray-700">User Name</label>
                    <select name="user_id" id="user_id" class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        required>
                        <option value="">Select Type</option>
                        @foreach ($allUsers as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="title" class="block text-gray-700">Reading Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- DOI -->
                <div>
                    <label for="doi" class="block text-gray-700">DOI</label>
                    <input type="text" name="doi" id="doi"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('doi') }}" required>
                    @error('doi')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Year -->
                <div>
                    <label for="year" class="block text-gray-700">Year</label>
                    <input type="number" name="year" id="year" min="1900" max="{{ date('Y') }}"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('year') }}" required>
                    @error('year')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Type -->
                <div>
                    <label for="type" class="block text-gray-700">Reading Type</label>
                    <select name="type" id="type" class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        required>
                        <option value="">Select Type</option>
                        <option value="Article" {{ old('type') == 'Article' ? 'selected' : '' }}>Article</option>
                        <option value="Book" {{ old('type') == 'Book' ? 'selected' : '' }}>Book</option>
                        <option value="Chapter" {{ old('type') == 'Chapter' ? 'selected' : '' }}>Chapter</option>
                    </select>
                    @error('type')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Create
                        Reading</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
