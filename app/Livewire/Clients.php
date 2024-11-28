<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClientInfo;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;

    protected $listeners = ['clientUpdated' => '$refresh'];

    public function delete($clientId)
    {
        $client = ClientInfo::findOrFail($clientId);
        $client->delete();
        session()->flash('message', 'Client deleted successfully.');
    }

    public function render()
    {
        $clients = ClientInfo::paginate(2);
        return view('livewire.clients', compact('clients'));
    }
}