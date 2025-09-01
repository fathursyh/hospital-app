<form wire:submit="login" class="space-y-6">
    <x-ui.custom-input
        id="email"
        label="Your Email"
        name="email"
        type="email"
        placeholder="name@company.com"
        wire:model.defer="email"
        autofocus
    />
    <x-ui.custom-input
        id="password"
        label="Password"
        name="password"
        type="password"
        placeholder="password"
        wire:model.defer="password"
    />
    <div class="flex items-center justify-between">
        <div class="flex items-start">
            <div class="flex h-5 items-center">
                <input wire:model="remember" id="remember" aria-describedby="remember" type="checkbox"
                    class="focus:ring-3 focus:ring-primary-300 h-4 w-4 rounded border border-gray-300 bg-gray-50">
            </div>
            <div class="ml-3 text-sm">
                <label for="remember" class="text-gray-500">Remember me</label>
            </div>
        </div>
        <a href="#" class="text-primary-600 dark:text-primary-500 text-sm font-medium hover:underline">Forgot
            password?</a>
    </div>

    <x-ui.button class="w-full py-3.5" wire:loading.disabled>
        <span wire:loading.remove>
            Sign In
        </span>
        <span class="ms-2" wire:loading>
            <x-ui.spinner class="h-4 w-4" />
        </span>
    </x-ui.button>
</form>
