<x-admin-app-layout>
    <div class="grid place-items-center my-10">
        <div class="w-full max-w-screen-lg p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:border-gray-700">
            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-semibold text-gray-800">Project Details</h1>
                <a href="{{ route('admin.project.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Back
                </a>
            </div>

            <!-- Project Data -->
            <dl class="divide-y divide-gray-200">
                <!-- Project Title -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Project Title:</dt>
                    <dd class="text-gray-800">{{ $project->title }}</dd>
                </div>

                   <!-- Start Date -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Start Date:</dt>
                    <dd class="text-gray-800">
                        {{ $project->start_date ? (new DateTime($project->start_date))->format('d M Y') : 'N/A' }}
                    </dd>
                </div>
                
                <!-- End Date -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">End Date:</dt>
                    <dd class="text-gray-800">
                        {{ $project->end_date ? (new DateTime($project->end_date))->format('d M Y') : 'N/A' }}
                    </dd>
                </div>

                <!-- Status -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Status:</dt>
                    <dd class="text-gray-800">{{ $project->status }}</dd>
                </div>

                <!-- Uploaded File -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Uploaded Project File:</dt>
                    <dd class="text-gray-800">
                        @if ($project->file_path)
                            @if (in_array(pathinfo($project->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                <img src="{{ asset('storage/' . $project->file_path) }}" alt="Project Image" class="w-32 h-32 object-cover rounded-lg">
                            @else
                                <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank" class="text-blue-600 hover:underline">Download File</a>
                            @endif
                        @else
                            <p class="text-gray-600">No file uploaded</p>
                        @endif
                    </dd>
                </div>

                <!-- Members -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Members:</dt>
                    <dd class="text-gray-800">
                        @if (is_array($project->members) && count($project->members) > 0)
                            <ul class="list-disc pl-5">
                                @foreach ($project->members as $memberId)
                                    @php
                                        $member = \App\Models\User::find($memberId);
                                    @endphp
                                    <li>{{ $member ? $member->name : 'Unknown Member' }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-600">No members assigned</p>
                        @endif
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-admin-app-layout>
