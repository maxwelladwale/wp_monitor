<?php

namespace App\Livewire;

use App\Models\ClientInfo;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientForm extends Component
{
    use WithFileUploads;

    public $client_id = null;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $url = '';
    public $logo;

    protected function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:client_infos,email,' . $this->client_id . ',client_id',
            'phone' => 'required|regex:/^[0-9\-\(\)\s]+$/|min:10|max:15',
            'url' => 'required|url|max:255',
            'logo' => 'nullable|image|max:2048', // Max 2MB
        ];
    }

    public function mount($clientId = null)
    {
        if ($clientId) {
            $client = ClientInfo::findOrFail($clientId);
            $this->client_id = $client->client_id;
            $this->name = $client->name;
            $this->email = $client->email;
            $this->phone = $client->phone;
            $this->url = $client->url;
        }
    }

    public function save()
    {
        $validatedData = $this->validate();

        $logoPath = $this->logo 
            ? $this->logo->store('logos', 'public') 
            : null;

        if ($this->client_id) {
            // Update existing client
            $client = ClientInfo::findOrFail($this->client_id);
            $client->update(array_filter([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'url' => $validatedData['url'],
                'logo_path' => $logoPath ?? $client->logo_path,
            ]));

            session()->flash('message', 'Client updated successfully.');
        } else {
            // Create new client
            ClientInfo::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'url' => $validatedData['url'],
                'logo_path' => $logoPath,
            ]);

            session()->flash('message', 'Client created successfully.');
        }

        // Reset form
        $this->reset(['name', 'email', 'phone', 'url', 'logo', 'client_id']);
        
        // Dispatch event to refresh client list
        $this->dispatch('client-updated');
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:2048'
        ]);
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'phone', 'url', 'logo', 'client_id']);
    }

    public function render()
    {
        return view('livewire.client-form');
    }
}