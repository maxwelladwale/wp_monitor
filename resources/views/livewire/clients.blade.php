<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Confirm Delete Modal -->
    <div 
        x-data="{ confirmDelete: false, clientId: null }" 
        x-show="confirmDelete" 
        x-cloak 
        class="fixed inset-0 flex items-center justify-center z-50"
    >
        <div 
            x-show="confirmDelete" 
            x-transition 
            class="bg-gray-500 bg-opacity-50 absolute inset-0 z-40"
            @click="confirmDelete = false"
        ></div>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full z-50">
            <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
            <p class="mb-4">Are you sure you want to delete this client?</p>
            <div class="flex justify-end space-x-2">
                <button 
                    @click="confirmDelete = false" 
                    class="bg-gray-300 p-2 rounded"
                >
                    Cancel
                </button>
                <button 
                    @click="$wire.delete(clientId); confirmDelete = false" 
                    class="bg-red-500 text-white p-2 rounded"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>

    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Name</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Phone</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">URL</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Logo</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($clients as $client)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $client->name }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $client->email }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $client->phone }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $client->url }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        <img src="{{ asset('storage/'.$client->logo_path) }}" alt="Client Logo" class="h-8 w-8 object-contain">
                    </td>
                    <td class="px-4 py-3 text-sm font-medium space-x-2">
                        <button 
                            wire:click="$dispatch('edit-client', { clientId: {{ $client->client_id }} })" 
                            class="text-blue-600 hover:text-blue-800"
                        >
                            <i class="fas fa-edit"></i>
                        </button>

                        <button 
                            @click="clientId = {{ $client->client_id }}; confirmDelete = true" 
                            class="text-red-600 hover:text-red-800"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $clients->links() }}
    </div>
</div>