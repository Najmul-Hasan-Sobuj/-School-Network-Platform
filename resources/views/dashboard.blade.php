<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- User Status Card -->
            <div class="bg-white shadow-lg rounded-lg p-6 flex items-center justify-between">
                <div class="text-gray-900">
                    <h3 class="text-xl font-semibold">Welcome back, {{ auth()->user()->name }}!</h3>
                    <p class="text-gray-600">You're logged in and all set to explore your dashboard.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="bg-green-100 text-green-600 text-sm px-4 py-2 rounded-lg">Online</span>
                    <a href="{{ route('profile.edit') }}" class="text-blue-600 hover:underline">Edit Profile</a>
                </div>
            </div>

            <!-- School Info Section -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800">School Information</h3>
                @if ($school)
                    <div class="mt-4">
                        <p><strong>Name:</strong> {{ $school->name }}</p>
                        <p><strong>Address:</strong> {{ $school->address ?? 'N/A' }}</p>
                        <p><strong>Country:</strong> {{ $school->country ?? 'N/A' }}</p>
                    </div>
                @else
                    <p class="text-gray-600 mt-4">No school information available.</p>
                @endif
            </div>

            <!-- Latest Projects Section -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Your Latest Projects</h3>
                </div>
                @if ($latestProjects->isEmpty())
                    <p class="text-gray-600 mt-4">You have no projects yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                        @foreach ($latestProjects as $project)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                                <h4 class="font-semibold text-gray-800 mb-2">{{ $project->title }}</h4>
                                <p class="text-sm text-gray-600">
                                    Status: <span class="font-bold">{{ $project->status }}</span>
                                </p>
                                <p class="text-sm text-gray-500">
                                    Started on: {{ \Carbon\Carbon::parse($project->start_date)->format('d M Y, h:i A') }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    End Date: {{ \Carbon\Carbon::parse($project->end_date)->format('d M Y, h:i A') ?? 'Ongoing' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Latest Readings Section -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Your Latest Readings</h3>
                </div>
                @if ($latestReadings->isEmpty())
                    <p class="text-gray-600 mt-4">You have no readings yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                        @foreach ($latestReadings as $reading)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                                <h4 class="font-semibold text-gray-800 mb-2">{{ $reading->title }}</h4>
                                <p class="text-sm text-gray-600">
                                    Published Year: <span class="font-bold">{{ $reading->year }}</span>
                                </p>
                                <p class="text-sm text-gray-500">Type: {{ $reading->type }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Other Bento Grid Elements -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Profile Completion, Activity Graph, Notifications, Task Progress, etc. -->
            </div>
        </div>
    </div>
</x-app-layout>
