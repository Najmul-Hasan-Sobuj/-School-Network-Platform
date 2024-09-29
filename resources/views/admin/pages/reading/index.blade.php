<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between mb-4">
            <div class="text-3xl font-semibold text-gray-500">Reading</div>
            <div>
                <a class="bg-[#36568b] hover:bg-[#556e9c] text-white font-bold py-1 px-3 rounded-lg"
                   href="{{ route('admin.reading.create') }}">Create</a>
            </div>
        </div>
        <div class="overflow-y-auto max-w-full">
            <table id="reading-table" class="display">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>DOI</th>
                        <th>Year</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#reading-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.reading.index') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'title', name: 'title' },
                        { data: 'doi', name: 'doi' },
                        { data: 'year', name: 'year' },
                        { data: 'type', name: 'type' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
