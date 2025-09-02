<form wire:submit="register" class="space-y-6">
<x-ui.custom-input
        id="name"
        label="Your Name"
        name="name"
        type="text"
        placeholder="John Doe"
        wire:model.defer="name"
        autofocus
        wire:loading.disabled
    />

    <x-ui.custom-input
        id="email"
        label="Your Email"
        name="email"
        type="email"
        placeholder="name@company.com"
        wire:model.defer="email"
        autofocus
        wire:loading.disabled
    />
    <x-ui.custom-input
        id="password"
        label="Password"
        name="password"
        type="password"
        placeholder="password"
        wire:model.defer="password"
        wire:loading.disabled
    />

    <x-ui.button class="w-full py-3.5 mt-4" wire:loading.disabled wire:click="register">
        <span wire:loading.remove>
            Sign Up
        </span>
        <span class="ms-2" wire:loading>
            <x-ui.spinner class="h-4 w-4" />
        </span>
    </x-ui.button>

</form>
