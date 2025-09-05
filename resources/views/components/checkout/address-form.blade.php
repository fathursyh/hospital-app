<div class="mb-4 grid grid-cols-1 gap-8 md:grid-cols-2">
    <x-ui.custom-input
        id="address"
        label="Hospital Address"
        name="address"
        placeholder="Your hospital address"
        type="text"
        wire:model.defer="address"
        wire:loading.disabled autofocus
    />
    <x-ui.custom-input
        id="website"
        label="Hospital Website (optional)"
        name="website"
        placeholder="Your hospital website"
        type="text"
        wire:model.defer="website"
    />
</div>
