<x-admin-app-layout>
    <div class="p-10">
        <div class="flex justify-between ...">
            <div class="text-3xl font-semibold mb-4 text-gray-500">Category</div>
            <div>
                <a class="bg-[#36568b] hover:bg-[#556e9c] text-white font-bold py-1 px-3 rounded-lg"
                    href="{{ route('admin.category.create') }}">Create</a>
            </div>
        </div>
        <div class="overflow-y-auto max-w-full">
            <table id="category-table" class="display">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
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
                $('#category-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.category.index') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        // {
                        //     data: 'image',
                        //     name: 'image',
                        //     render: function(data, type, row) {
                        //         var imagePath = data ? '{{ asset('storage/') }}/' + data :
                        //             '{{ asset('admin/src/assets/images/pre.png') }}';
                        //         return '<img src="' + imagePath +
                        //             '" alt="Current Executive Committee Image" style="max-width: 50px; max-height: 50px;">';
                        //     }
                        // },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data, type, row) {
                                return `<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input id="categorySwitch_${row.id}" type="checkbox" ${data == 1 ? 'checked' : ''} onchange="toggleCategoryStatus(${row.id})" class="me-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-full bg-gray-400 transition-colors before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:bg-gray-300 after:shadow-md after:transition-transform checked:bg-[#4361EE] checked:after:translate-x-4 checked:after:bg-[#4361EE] hover:cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#4361EE]">
                                </div>`;
                            }
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

            function toggleCategoryStatus(id) {
                const route = '{{ route('admin.category.toggle-status', ':id') }}'.replace(':id', id);
                toggleStatus(route, id, 'categorySwitch');
            }
        </script>
    @endpush
</x-admin-app-layout>
