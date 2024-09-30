<x-admin-app-layout>
    <!-- Main Content -->
    <div class="lg:text-3xl md:text-2xl text-md font-semibold mb-4 text-gray-500 ml-6 p-4">
        {{ $title ?? config('app.name') }}
    </div>

    <div class="overflow-y-auto max-w-full p-4">
        @canany(['dashboard.view'])
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                @if (auth()->user()->hasRole('Super Admin'))
                    <!-- Total Schools -->
                    <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                        <div class="text-gray-500 text-sm">Total Schools</div>
                        <div class="text-2xl font-semibold text-gray-800">{{ $totalSchools }}</div>
                        <div class="mt-2">
                            <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View details</a>
                        </div>
                    </div>

                    <!-- Total Admins -->
                    <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                        <div class="text-gray-500 text-sm">Total Admins</div>
                        <div class="text-2xl font-semibold text-gray-800">{{ $totalAdmins }}</div>
                        <div class="mt-2">
                            <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View details</a>
                        </div>
                    </div>
                @endif

                <!-- Total Students -->
                <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                    <div class="text-gray-500 text-sm">Total Students</div>
                    <div class="text-2xl font-semibold text-gray-800">{{ $totalStudents }}</div>
                    <div class="mt-2">
                        <a href="{{ route('admin.personal.index') }}"
                            class="text-indigo-500 hover:text-indigo-700 text-sm">View all students</a>
                    </div>
                </div>

                <!-- Pending Approvals -->
                <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                    <div class="text-gray-500 text-sm">Pending Approvals</div>
                    <div class="text-2xl font-semibold text-gray-800">{{ $pendingApprovals }}</div>
                    <div class="mt-2">
                        <a href="{{ route('admin.personal.index') }}"
                            class="text-indigo-500 hover:text-indigo-700 text-sm">View all pending approvals</a>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                    <div class="flex justify-between">
                        <div class="text-gray-500 text-sm">Notifications</div>
                        <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $pendingApprovals }}</span>
                    </div>
                    <ul class="mt-2 text-sm">
                        <li class="text-gray-700">• New student registrations pending approval</li>
                    </ul>
                    <div class="mt-2">
                        <a href="{{ route('admin.personal.index') }}"
                            class="text-indigo-500 hover:text-indigo-700 text-sm">View all</a>
                    </div>
                </div>

                <!-- Latest Students -->
                <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                    <div class="text-gray-500 text-sm">Latest Students</div>
                    <ul class="mt-2">
                        @foreach ($latestStudents as $student)
                            <li class="text-gray-700">{{ $student->name }} - <a
                                    href="{{ route('admin.personal.show', $student) }}"
                                    class="text-indigo-500 hover:text-indigo-700">Approve</a></li>
                        @endforeach
                    </ul>
                    <div class="mt-2">
                        <a href="{{ route('admin.personal.index') }}"
                            class="text-indigo-500 hover:text-indigo-700 text-sm">View all students</a>
                    </div>
                </div>
            </div>
        @endcanany
    </div>
</x-admin-app-layout>
