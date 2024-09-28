<x-admin-app-layout>
    <div class="grid place-items-center my-10">
        <div class="w-full max-w-screen-lg p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:border-gray-700">
            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-semibold text-gray-800">Category Details</h1>
                <a href="{{ route('admin.category.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Back
                </a>
            </div>

            <!-- Category Data -->
            <dl class="divide-y divide-gray-200">
                <!-- Category Name -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Category Name:</dt>
                    <dd class="text-gray-800">{{ $category->name }}</dd>
                </div>

                <!-- Category Status -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Status:</dt>
                    <dd class="text-gray-800">
                        @if($category->status === 1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Inactive
                            </span>
                        @endif
                    </dd>
                </div>

                <!-- Created At -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Created At:</dt>
                    <dd class="text-gray-800">{{ $category->created_at->format('d M Y, h:i A') }}</dd>
                </div>

                <!-- Updated At -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Last Updated:</dt>
                    <dd class="text-gray-800">{{ $category->updated_at->format('d M Y, h:i A') }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-admin-app-layout>
