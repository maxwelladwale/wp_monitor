<div x-data="{
    open: @entangle('modalOpen').live,
    init() {
        this.$watch('open', value => {
            if (!value) this.resetForm();
        });
    },
    resetForm() {
        $wire.resetFields();
    }
}" x-show="open" x-cloak
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div x-show="open" x-transition class="bg-white w-full max-w-md mx-4 md:mx-auto rounded-lg shadow-xl p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            {{ $isEdit ? 'Edit Client' : 'Add New Client' }}
        </h2>

        <form wire:submit.prevent="store" class="space-y-4">
            <div>
                <label for="name" class="block text-gray-700 mb-2">Name</label>
                <input type="text" id="name" wire:model="name" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter client name">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <input type="email" id="email" wire:model="email" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter client email">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-gray-700 mb-2">Phone</label>
                <input type="tel" id="phone" wire:model="phone" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter client phone">
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="url" class="block text-gray-700 mb-2">Website URL</label>
                <input type="url" id="url" wire:model="url" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter client website">
                @error('url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="logoPath" class="block text-gray-700 mb-2">Logo (Optional)</label>
                <input type="file" id="logoPath" wire:model="logoPath"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('logoPath')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" @click="open = false"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                    {{ $isEdit ? 'Update Client' : 'Add Client' }}
                </button>
            </div>
        </form>
    </div>
</div>
