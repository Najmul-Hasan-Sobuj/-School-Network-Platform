<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Edit Reading</h1>
            <a href="{{ route('admin.reading.index') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Back
            </a>
        </div>

        <form action="{{ route('admin.reading.update', $reading->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <!-- Reading Title -->
                <div>
                    <label for="title" class="block text-gray-700">Reading Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        value="{{ old('title', $reading->title) }}" required>
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- DOI -->
                <div>
                    <label for="doi" class="block text-gray-700">DOI</label>
                    <input type="text" name="doi" id="doi"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        value="{{ old('doi', $reading->doi) }}" required>
                    @error('doi')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Year -->
                <div>
                    <label for="year" class="block text-gray-700">Year</label>
                    <input type="number" name="year" id="year" min="1900" max="{{ date('Y') }}"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        value="{{ old('year', $reading->year) }}" required>
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
                        <option value="Article" {{ old('type', $reading->type) == 'Article' ? 'selected' : '' }}>Article
                        </option>
                        <option value="Book" {{ old('type', $reading->type) == 'Book' ? 'selected' : '' }}>Book
                        </option>
                        <option value="Chapter" {{ old('type', $reading->type) == 'Chapter' ? 'selected' : '' }}>
                            Chapter</option>
                    </select>
                    @error('type')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
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
