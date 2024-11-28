<div 
    x-data="{ open: @entangle('modalOpen').live }" 
    x-show="open" 
    x-cloak 
    class="fixed inset-0 flex items-center justify-center z-50"
>
    <div 
        x-show="open" 
        x-transition 
        class="bg-gray-500 bg-opacity-50 absolute inset-0 z-40"
        @click="open = false"
    ></div>

    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full z-50">
        <h2 class="text-xl font-semibold mb-4">{{ $isEdit ? 'Edit Client' : 'Create Client' }}</h2>
        <form wire:submit.prevent="store">
            <div class="space-y-4">
                <input type="text" wire:model="name" class="w-full p-2 border rounded" placeholder="Name" required>
                <input type="email" wire:model="email" class="w-full p-2 border rounded" placeholder="Email" required>
                <input type="text" wire:model="phone" class="w-full p-2 border rounded" placeholder="Phone" required>
                <input type="url" wire:model="url" class="w-full p-2 border rounded" placeholder="Website URL" required>
                <input type="file" wire:model="logoPath" class="w-full p-2 border rounded" placeholder="Logo">

                <div class="flex justify-between items-center mt-4">
                    <button type="button" @click="open = false" class="bg-gray-300 p-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">
                        {{ $isEdit ? 'Update' : 'Create' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>