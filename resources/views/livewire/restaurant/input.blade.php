<x-jet-form-section submit="createItem">
    <x-slot name="title">
        {{ __('Find Restaurant Location') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Find Top 20 Restuarant.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="location" value="{{ __('Base Location') }}" />
            <x-jet-input id="location" type="text" class="mt-1 block w-full" wire:model.defer="location" />
            <x-jet-input-error for="location" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Completed.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Search Location') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>