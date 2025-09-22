<x-ui.custom-input id="name" label="Full Name" name="name" type="text" placeholder="Enter your fullname"
    wire:model.defer="name" wire:loading.disabled />
<x-ui.custom-input id="name" label="Gender" name="name" type="radio" placeholder="Enter your fullname"
    wire:model.defer="name" wire:loading.disabled>
    <div class="flex gap-2 px-2">
        <label for="man" class="flex flex-row-reverse items-center gap-2">
            Man
            <input type="radio" name="gender" value="m" id="man" wire:model.defer="gender">
        </label>
        <label for="man" class="flex flex-row-reverse items-center gap-2">
            Woman
            <input type="radio" name="gender" value="w" id="woman" wire:model.defer="gender">
        </label>
    </div>
</x-ui.custom-input>
<x-ui.custom-input id="birth" label="Date of Birth" name="birth" type="date" placeholder="Enter your fullname"
    wire:model.defer="birth" wire:loading.disabled max="{{ date('Y-m-d') }}" />
<x-ui.custom-input id="phone" label="Phone Number" name="phone" type="tel" placeholder="Enter phone number"
    wire:model.defer="phone" wire:loading.disabled />
<x-ui.custom-input id="address" label="Address" name="address" type="text" placeholder="Enter your address"
    wire:model.defer="address" wire:loading.disabled />

<x-ui.button class="w-full mt-4" type="button" wire:click="nextStep">Next</x-ui.button>
