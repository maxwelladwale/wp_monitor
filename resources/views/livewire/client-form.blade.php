<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input 
                type="text" 
                wire:model="name" 
                id="name" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 
                    @error('name') border-red-500 @enderror"
                placeholder="Enter client name"
            >
            @error('name')
                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input 
                type="email" 
                wire:model="email" 
                id="email" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3
                    @error('email') border-red-500 @enderror"
                placeholder="Enter client email"
            >
            @error('email')
                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input 
                type="tel" 
                wire:model="phone" 
                id="phone" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3
                    @error('phone') border-red-500 @enderror"
                placeholder="Enter phone number"
            >
            @error('phone')
                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="url" class="block text-sm font-medium text-gray-700">Website URL</label>
            <input 
                type="url" 
                wire:model="url" 
                id="url" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3
                    @error('url') border-red-500 @enderror"
                placeholder="Enter website URL"
            >
            @error('url')
                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
            <input 
                type="file" 
                wire:model="logo" 
                id="logo" 
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3
                    @error('logo') border-red-500 @enderror"
            >
            @error('logo')
                <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
            @enderror

            @if ($logo)
                <div class="mt-2">
                    <img src="{{ $logo->temporaryUrl() }}" alt="Preview" class="h-20 w-20 object-cover rounded">
                </div>
            @endif
        </div>

        <div class="flex justify-between items-center">
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300"
            >
                {{ $client_id ? 'Update Client' : 'Add Client' }}
            </button>

            @if ($client_id)
                <button 
                    type="button" 
                    wire:click="resetForm"
                    class="text-gray-500 hover:text-gray-700"
                >
                    Cancel
                </button>
            @endif
        </div>
    </form>
</div>