@extends('layouts.app')

@section('title', 'Clients Management')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Client Form Section -->
        <div class="md:col-span-1 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                Add New Client
            </h2>
            
            <livewire:client-form />
        </div>

        <!-- Clients List Section -->
        <div class="md:col-span-2 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                Client List
            </h2>
            
            <livewire:clients />
        </div>
    </div>

    <livewire:client-modal />
</div>
@endsection