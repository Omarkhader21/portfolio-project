<x-filament-panels::page>
    <!-- Page Header -->
    <div class="space-y-4">
        <h1 class="text-xl font-bold text-gray-800">General Developer Information</h1>
        <p class="text-sm text-gray-600">Update the developer's details to reflect on the home page.</p>
    </div>

    <!-- Form Container -->
    <div class="mt-6 max-w-10xl mx-auto">
        <x-filament-panels::form wire:submit="save">
            <!-- Form Content -->
            <div class="space-y-6">
                {{ $this->form }}
            </div>

            <!-- Form Actions -->
            <div class="mt-4">
                <x-filament-panels::form.actions :actions="$this->getFormActions()" />
            </div>
        </x-filament-panels::form>
    </div>
</x-filament-panels::page>
