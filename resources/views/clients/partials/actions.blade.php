<div class="flex space-x-2">
    <button wire:click="$dispatch('open-client-modal', { clientId: {{ $client->client_id }} })"
        class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit Client">
        <i class="fas fa-edit"></i>
    </button>
    <button wire:click="confirmDelete({{ $client->client_id }})"
        class="text-red-500 hover:text-red-700 transition-colors" title="Delete Client">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>
