<x-admin-app-layout>
    <div class="grid place-items-center my-10">
        <div
            class="w-full max-w-screen-lg p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:border-gray-700">
            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-semibold text-gray-800">Student Personal Details</h1>
                <a href="{{ route('admin.personal.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Back
                </a>
            </div>

            <!-- Personal Data -->
            <dl class="divide-y divide-gray-200">
                <!-- Full Name -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Full Name:</dt>
                    <dd class="text-gray-800">{{ $personal->name }}</dd>
                </div>

                <!-- Gender -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Gender:</dt>
                    <dd class="text-gray-800">
                        {{ $personal->gender === 'M' ? 'Male' : ($personal->gender === 'F' ? 'Female' : 'N/A') }}</dd>
                </div>

                <!-- Address -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Address:</dt>
                    <dd class="text-gray-800">{{ $personal->address }}</dd>
                </div>

                <!-- Country -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Country:</dt>
                    <dd class="text-gray-800">{{ $personal->country }}</dd>
                </div>

                <!-- Date of Birth -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Date of Birth:</dt>
                    <dd class="text-gray-800">{{ optional($personal->dob)->format('d M Y') ?? 'N/A' }}</dd>
                </div>

                <!-- Phone Number -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Phone Number:</dt>
                    <dd class="text-gray-800">{{ $personal->phone }}</dd>
                </div>

                <!-- Email Address -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Email Address:</dt>
                    <dd class="text-gray-800">{{ $personal->email }}</dd>
                </div>

                <!-- Approval Toggle (For Admin Only) -->
                @can('student.approve')
                    <div class="py-4 flex justify-between items-start">
                        <dt class="text-gray-600 font-medium">Approval Status:</dt>
                        <dd>
                            <form id="approval-form-{{ $personal->id }}"
                                action="{{ route('admin.personal.toggleApproval', $personal->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="button" onclick="confirmApproval({{ $personal->id }})"
                                    class="px-4 py-2 {{ $personal->is_approved ? 'bg-green-500' : 'bg-red-500' }} text-white rounded-md">
                                    {{ $personal->is_approved ? 'Approved' : 'Not Approved' }}
                                </button>
                            </form>
                        </dd>
                    </div>
                @endcan

                <!-- Created At -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Created At:</dt>
                    <dd class="text-gray-800">{{ optional($personal->created_at)->format('d M Y, h:i A') ?? 'N/A' }}
                    </dd>
                </div>

                <!-- Updated At -->
                <div class="py-4 flex justify-between items-start">
                    <dt class="text-gray-600 font-medium">Last Updated:</dt>
                    <dd class="text-gray-800">{{ optional($personal->updated_at)->format('d M Y, h:i A') ?? 'N/A' }}
                    </dd>
                </div>
            </dl>

            <!-- School Information Section -->
            <div class="mt-8 border-t border-gray-300 pt-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">School Information</h2>
                <dl class="divide-y divide-gray-200">
                    <!-- School Name -->
                    <div class="py-4 flex justify-between items-start">
                        <dt class="text-gray-600 font-medium">School Name:</dt>
                        <dd class="text-gray-800">{{ $personal->school->name ?? 'N/A' }}</dd>
                    </div>

                    <!-- School Address -->
                    <div class="py-4 flex justify-between items-start">
                        <dt class="text-gray-600 font-medium">School Address:</dt>
                        <dd class="text-gray-800">{{ $personal->school->address ?? 'N/A' }}</dd>
                    </div>

                    <!-- School Country -->
                    <div class="py-4 flex justify-between items-start">
                        <dt class="text-gray-600 font-medium">School Country:</dt>
                        <dd class="text-gray-800">{{ $personal->school->country ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function confirmApproval(personalId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to change the approval status.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('approval-form-' + personalId).submit();
                    }
                });
            }
        </script>
    @endpush
</x-admin-app-layout>
