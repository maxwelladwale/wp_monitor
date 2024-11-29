@extends('layouts.app')

@section('title', 'Clients Management')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 gap-6">
            <div class="md:col-span-2 bg-white shadow-md rounded-lg p-6">
                <livewire:clients />
                <livewire:client-modal />
            </div>
        </div>
    </div>
@endsection
