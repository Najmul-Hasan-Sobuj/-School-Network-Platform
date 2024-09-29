<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between ...">
            <div class="text-3xl font-semibold mb-4 text-gray-500">Project</div>
            <div>
                <a class="bg-[#36568b] hover:bg-[#556e9c] text-white font-bold py-1 px-3 rounded-lg"
                    href="{{ route('admin.project.create') }}">Create</a>
            </div>
        </div>
        <div class="overflow-y-auto max-w-full">
            <table id="project-table" class="display">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#project-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.project.index') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'start_date',
                            name: 'start_date'
                        },
                        {
                            data: 'end_date',
                            name: 'end_date'
                        },
                        {
                            data: 'status',
                            name: 'status'
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
