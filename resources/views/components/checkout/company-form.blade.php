<div class="mb-4 grid grid-cols-1 gap-8 md:grid-cols-2">
    <x-ui.custom-input
        id="hospital-name"
        label="Hospital Name"
        name="hospitalName"
        placeholder="Your hospital name"
        type="text"
        wire:model.defer="hospitalName"
        wire:loading.disabled autofocus
    />
    <x-ui.custom-input
        id="hospital-license"
        label="Hospital License"
        name="hospitalLicense"
        placeholder="Your hospital license"
        type="text"
        wire:model.defer="hospitalLicense"
        wire:loading.disabled
    />
</div>
<div class="mb-4 grid grid-cols-1 gap-8 md:grid-cols-2">
    <x-ui.custom-input
        id="hospital-type"
        label="Hospital Type"
        name="hospitalType"
        placeholder="Your hospital type"
        type="select"
        wire:model.defer="hospitalType"
        wire:loading.disabled>
         @foreach ($hospitalEnum as $option)
             <option value="{{ $option }}">{{ $option }}</option>
         @endforeach
    </x-ui.custom-input>
    <x-ui.custom-input
        id="company-phone"
        label="Company Phone Number"
        name="phone"
        placeholder="Your company phone number"
        type="tel"
        wire:model.defer="phone"
        wire:loading.disabled
    />
</div>
