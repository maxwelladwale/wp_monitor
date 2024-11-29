<?php

namespace App\Livewire;

use App\Models\ClientInfo;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientModal extends Component
{
    use WithFileUploads;

    public $clientId;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $url = '';
    public $logoPath = null;
    public $modalOpen = false;
    public $isEdit = false;

    protected $listeners = [
        'open-client-modal' => 'openModal'
    ];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'url' => 'required|url|max:255',
            'logoPath' => 'nullable|image|max:1024',
        ];
    }

    public function openModal($clientId = null)
    {
        $this->resetFields();

        if ($clientId) {
            $client = ClientInfo::findOrFail($clientId);
            $this->clientId = $client->client_id;
            $this->name = $client->name;
            $this->email = $client->email;
            $this->phone = $client->phone;
            $this->url = $client->url;
            $this->isEdit = true;
        }

        $this->modalOpen = true;
    }

    public function resetFields()
    {
        $this->reset([
            'clientId',
            'name',
            'email',
            'phone',
            'url',
            'logoPath',
            'isEdit'
        ]);
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'url' => $this->url,
        ];

        // Handle logo upload
        if ($this->logoPath) {
            $data['logo_path'] = $this->logoPath->store('logos', 'public');
        }

        if ($this->isEdit) {
            $client = ClientInfo::findOrFail($this->clientId);
            $client->update($data);
            $message = 'Client updated successfully.';
        } else {
            ClientInfo::create($data);
            $message = 'Client created successfully.';
        }

        session()->flash('message', $message);
        $this->modalOpen = false;
    }

    public function render()
    {
        return view('livewire.client-modal');
    }
}
