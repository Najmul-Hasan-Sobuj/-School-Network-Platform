<x-admin-app-layout>
    <div class="grid place-items-center my-10">
        <div class="w-full max-w-screen-lg p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:border-gray-700">
            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-semibold text-gray-800">School Details</h1>
                <a href="{{ route('admin.school.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Back
                </a>
            </div>

            <!-- School Data -->
            <dl class="divide-y divide-gray-200">
                <!-- School Name -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">School Name:</dt>
                    <dd class="text-gray-800">{{ $school->name }}</dd>
                </div>

                <!-- Address -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Address:</dt>
                    <dd class="text-gray-800">{{ $school->address }}</dd>
                </div>

                <!-- Country -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Country:</dt>
                    <dd class="text-gray-800">{{ $school->country }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-admin-app-layout>
