<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-semibold text-gray-800">Edit Project</h1>
            <a href="{{ route('admin.project.index') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Back
            </a>
        </div>

        <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <!-- Project Title -->
                <div>
                    <label for="user_id" class="block text-gray-700">User Name</label>
                    <select name="user_id" id="user_id" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" required>
                        <option value="">Select User</option>
                        @foreach ($allUsers as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $project ?? '') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <label for="title" class="block text-gray-700">Project Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        value="{{ old('title', $project->title) }}" required>
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-gray-700">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        value="{{ old('start_date', $project->start_date) }}" required>
                    @error('start_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="block text-gray-700">End Date (Optional)</label>
                    <input type="date" name="end_date" id="end_date"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        value="{{ old('end_date', $project->end_date) }}">
                    @error('end_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-gray-700">Project Status</label>
                    <select name="status" id="status" class="w-full mt-1 p-2 border border-gray-300 rounded-lg"
                        required>
                        <option value="Completed"
                            {{ old('status', $project->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="In progress"
                            {{ old('status', $project->status) == 'In progress' ? 'selected' : '' }}>In progress
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
                    @if ($project->file_path)
                        <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank"
                            class="text-blue-600 hover:underline">Download Current File</a>
                    @endif
                    @error('file_path')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Members (Array) -->
                <div class="mt-4">
                    <x-input-label for="members" :value="__('Members')" />
                    <select class="dropdown" name="members[]" style="width: 100%" multiple required>
                        @foreach ($allMembers as $member)
                            <option value="{{ $member->id }}" @if (in_array($member->id, old('members', $project->members ?? []))) selected @endif>
                                {{ $member->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('members')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Update
                        Project</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-app-layout>
