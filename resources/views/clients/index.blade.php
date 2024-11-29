@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Clients</h2>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table id="clientinfo-table" class="min-w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Website</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#clientinfo-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('newclients.get') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'url', name: 'url' },
                    { 
                        data: 'logo_path',
                        render: function(data, type, row) {
                            return data ? `<img src="/storage/${data}" class="h-10 w-10 object-contain rounded">` : '<span class="text-gray-400">No Logo</span>';
                        }
                    },
                    {
                        data: 'actions',
                        render: function(data, type, row) {
                            return `
                                <div class="flex justify-end space-x-2">
                                    <button class="text-blue-500 hover:text-blue-700 transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-500 hover:text-red-700 transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            `;
                        }
                    }
                ],
                order: [[0, 'asc']],
                drawCallback: function() {
                    // Add hover effects to rows
                    $('#clientinfo-table tbody tr').addClass('hover:bg-gray-50 transition-colors');
                }
            });
        });
    </script>
@endsection