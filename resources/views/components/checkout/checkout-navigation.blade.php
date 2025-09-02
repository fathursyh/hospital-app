<div class="mt-8 flex justify-between">
    <div>
        @if ($currentStep > 1)
            <button type="button" wire:click="previousStep"
                class="w-32 rounded-lg bg-gray-300 py-2.5 font-medium text-gray-700 transition duration-300 hover:bg-gray-400">
                Previous
            </button>
        @endif
    </div>

    <div>
        @if ($currentStep < $totalSteps)
            <x-ui.button class="w-32" wire:click="nextStep" wire:loading.disabled type="button">
                <span wire:loading.remove>
                    Next
                </span>
                <span class="ms-2" wire:loading>
                    <x-ui.spinner class="h-4 w-4" />
                </span>
            </x-ui.button>
        @else
            <button type="submit"
                class="rounded-lg bg-green-600 px-6 py-2 font-medium text-white transition duration-300 hover:bg-green-700">
                Complete Checkout
            </button>
        @endif
    </div>
</div>
