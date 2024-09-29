<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-semibold text-gray-500">Create New Project</h1>
        </div>

        <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <!-- Project Title -->
                <div>
                    <label for="title" class="block text-gray-700">Project Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-gray-700">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('start_date') }}"
                        required>
                    @error('start_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="block text-gray-700">End Date (Optional)</label>
                    <input type="date" name="end_date" id="end_date"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg" value="{{ old('end_date') }}">
                    @error('end_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-gray-700">Project Status</label>
                    <select name="status" id="status" class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        required>
                        <option value="">Select Status</option>
                        <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="In progress" {{ old('status') == 'In progress' ? 'selected' : '' }}>In progress
                        </option>
                    </select>
                    @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Project File -->
                <div>
                    <label for="file_path" class="block text-gray-700">Upload Project File (PDF/Image)</label>
                    <input type="file" name="file_path" id="file_path"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg">
                    @error('file_path')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Members (Array) -->
                <div class="mt-4">
                    <x-input-label for="members" :value="__('Members')" />
                    <select class="dropdown" name="members[]" style="width: 100%" multiple required>
                        @foreach ($allMembers as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('members')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Create
                        Project</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
