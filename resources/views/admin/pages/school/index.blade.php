<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between mb-4">
            <div class="text-3xl font-semibold text-gray-500">Schools</div>
            <div>
                <a class="bg-[#36568b] hover:bg-[#556e9c] text-white font-bold py-1 px-3 rounded-lg"
                   href="{{ route('admin.school.create') }}">Create</a>
            </div>
        </div>
        <div class="overflow-y-auto max-w-full">
            <table id="school-table" class="display">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#school-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.school.index') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'name', name: 'name' },
                        { data: 'address', name: 'address' },
                        { data: 'country', name: 'country' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
