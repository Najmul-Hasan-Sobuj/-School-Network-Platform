<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between mb-4">
            <div class="text-3xl font-semibold mb-4 text-gray-500">Student Personal Information</div>
            {{-- <div>
                <a class="bg-[#36568b] hover:bg-[#556e9c] text-white font-bold py-1 px-3 rounded-lg"
                    href="{{ route('admin.personal.show') }}">Details</a>
            </div> --}}
        </div>
        <div class="overflow-y-auto max-w-full">
            <table id="user-table" class="display">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#user-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.personal.index') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'gender',
                            name: 'gender',
                            render: function(data) {
                                return data === 'M' ? 'Male' : 'Female';
                            }
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
