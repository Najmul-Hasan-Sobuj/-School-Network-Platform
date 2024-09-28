<x-admin-app-layout>
    <div class="p-10 -z-40">
        <div class="flex justify-between items-center">
            <div class="flex space-x-2 items-center py-2">
                <div class="text-3xl font-semibold text-gray-500">Backups</div>
            </div>
        </div>

        <div class="overflow-y-auto max-w-full">
            <table id="backupTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Filename</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created At</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($backups as $backup)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ basename($backup) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ date('Y-m-d H:i:s', filemtime($backup)) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form
                                    action="{{ route('admin.project.delete.backup', ['filename' => basename($backup)]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this backup?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
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
                $('#backupTable').DataTable();
            });
        </script>
    @endpush
</x-admin-app-layout>
