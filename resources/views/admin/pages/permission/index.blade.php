<x-admin-app-layout>
    <div class="p-10 -z-40">
        <div class="flex justify-between items-center">
            <div class="flex space-x-2 items-center py-2">
                <div class="text-3xl font-semibold text-gray-500"> Permission Table</div>
            </div>
            <div><a href="{{ route('admin.permission.create') }}"
                    class="btn_navy text-white text-lg px-5 rounded-md">Create</a>
            </div>
        </div>

        <div class="overflow-y-auto max-w-full">
            <table id="dataTable">
                <thead>
                    <tr>
                       <th>Sl</th>
                       <th>Name</th>
                       <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td>
                                <a href="{{ route('admin.permission.edit', $permission->id) }}"
                                    class="btn_paste text-white text-lg px-5 ">Edit</a>
                                <a href="{{ route('admin.permission.destroy', $permission->id) }}"
                                    class="btn_red text-white text-lg px-5 delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    @endpush
</x-admin-app-layout>
