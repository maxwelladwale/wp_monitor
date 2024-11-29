<?php

namespace App\Livewire;

use App\Models\ClientInfo;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientModal extends Component
{
    use WithFileUploads;

    public $clientId;
    public $name;
    public $email;
    public $phone;
    public $url;
    public $logoPath;
    public $modalOpen = false;
    public $isEdit = false;

    protected $listeners = [
        'edit-client' => 'openEditModal'
    ];

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'url' => 'required|url',
            'logoPath' => 'nullable|image',
        ];
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'url' => $this->url,
            'logo_path' => $this->logoPath 
                ? $this->logoPath->store('logos', 'public') 
                : null,
        ];

        if ($this->isEdit) {
            $client = ClientInfo::find($this->clientId);
            $client->update($data);
        } else {
            ClientInfo::create($data);
        }

        $this->modalOpen = false;
        $this->dispatch('clientUpdated');
        session()->flash('message', $this->isEdit 
            ? 'Client updated successfully.' 
            : 'Client created successfully.');
    }

    public function openEditModal($clientId)
    {
        $client = ClientInfo::find($clientId);
        $this->clientId = $client->client_id;
        $this->name = $client->name;
        $this->email = $client->email;
        $this->phone = $client->phone;
        $this->url = $client->url;
        $this->logoPath = $client->logo_path;
        $this->modalOpen = true;
        $this->isEdit = true;
    }

    public function render()
    {
        return view('livewire.client-modal');
    }
}