<div>
    <!-- Success Message -->
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="fixed top-4 right-4 bg-green-500 text-white p-3 rounded-lg shadow-lg z-50 transition-all">
            {{ session('message') }}
        </div>
    @endif

    <!-- Clients Header with Add Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Clients</h2>
        <button wire:click="$dispatch('open-client-modal')"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Client
        </button>
    </div>

    <!-- Client Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Website
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($clients as $client)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-4 whitespace-nowrap">{{ $client->name }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $client->email }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $client->phone }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <a href="{{ $client->url }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $client->url }}
                            </a>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            @if ($client->logo_path)
                                <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }} logo"
                                    class="h-10 w-10 object-contain rounded">
                            @else
                                <span class="text-gray-400">No Logo</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2">
                                <button
                                    wire:click="$dispatch('open-client-modal', { clientId: {{ $client->client_id }} })"
                                    class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit Client">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="confirmDelete({{ $client->client_id }})"
                                    class="text-red-500 hover:text-red-700 transition-colors" title="Delete Client">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                            No clients found. Click "Add Client" to get started.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $clients->links() }}
    </div>

    <!-- Confirm Delete Modal -->
    <div x-data="{ confirmDelete: @entangle('showDeleteModal').live }" x-show="confirmDelete" x-cloak
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Confirm Deletion</h2>
            <p class="mb-6 text-gray-600">Are you sure you want to delete this client?</p>
            <div class="flex justify-end space-x-3">
                <button @click="$wire.cancelDelete()"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button @click="$wire.deleteClient()"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>
