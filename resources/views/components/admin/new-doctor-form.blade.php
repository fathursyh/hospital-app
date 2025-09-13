<form class="space-y-2 w-full bg-white rounded p-8" wire:submit="save">
    <h2 class="text-xl font-bold text-center">New Doctor</h2>
    <x-ui.custom-input id="name" label="Doctor Name" name="name" type="text" placeholder="John Doe"
        wire:model.defer="name" wire:loading.disabled />
    <x-ui.custom-input id="specialization" label="Doctor Specialization" name="specialization" type="text"
        placeholder="Cardiology" wire:model.defer="specialization" wire:loading.disabled />
    <x-ui.custom-input id="email" label="Doctor Email" name="email" type="email" placeholder="name@company.com"
        wire:model.defer="email" wire:loading.disabled />
    <x-ui.custom-input id="phone" label="Doctor Phone" name="phone" type="tel" placeholder="phone"
        wire:model.defer="phone" wire:loading.disabled />
    <x-ui.custom-input id="password" label="Password" name="password" type="password" placeholder="Password"
        wire:model.defer="password" wire:loading.disabled />
    <x-ui.custom-input id="confirm-password" label="Confirm Password" name="password_confirmation" type="password" placeholder="Confirm password" wire:model.defer="password_confirmation" wire:loading.disabled />
    <x-ui.button type="submit" class="w-full mt-4">Create</x-ui.button>
</form>
