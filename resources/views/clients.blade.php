@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Clients</h2>

        @if($clients->isEmpty())
            <div class="text-center py-4 px-6 text-lg text-gray-600">No Clients Found</div>
        @else
            <div class="overflow-x-auto">
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
                                <a href="{{ route('clients.edit', $client->client_id) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <form action="{{ route('clients.destroy', $client->client_id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('clients.show', $client->client_id) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $clients->links('pagination::tailwind') }}
            </div>
        @endif
    </div>
</div>
@endsection
