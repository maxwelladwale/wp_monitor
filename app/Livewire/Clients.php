<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClientInfo;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;

    public $clientToDelete = null;
    public $showDeleteModal = false;

    public function confirmDelete($clientId)
    {
        $this->clientToDelete = $clientId;
        $this->showDeleteModal = true;
    }

    public function cancelDelete()
    {
        $this->clientToDelete = null;
        $this->showDeleteModal = false;
    }

    public function deleteClient()
    {
        if ($this->clientToDelete) {
            $client = ClientInfo::findOrFail($this->clientToDelete);
            $client->delete();

            session()->flash('message', 'Client deleted successfully.');

            $this->clientToDelete = null;
            $this->showDeleteModal = false;
        }
    }

    public function render()
    {
        $clients = ClientInfo::paginate(10);
        return view('livewire.clients', compact('clients'));
    }
}
