<div class="h-[80vh] rounded border border-gray-300 bg-white p-8 shadow">

    {{-- progress --}}
    @include('components.checkout.progress-bar')

    {{-- forms --}}
    <form wire:submit="submit">
        @if ($currentStep === 1)
            {{-- Step 1: Company form --}}
            @if ($selectedPlan === null)
                @teleport('body')
                <dialog class="fixed top-0 left-0 w-screen h-screen bg-black/70 grid place-items-center" open>
                    <div class="md:w-xl w-sm min-h-[300px] bg-white rounded p-4 flex flex-col" x-on:click.outside="Livewire.navigate('/')">
                        <h3 class="text-center text-2xl font-black mb-4">Pick your plan</h3>
                        <div class="flex-1 grid grid-cols-3 md:gap-4 gap-2">
                            @foreach ($plans as $plan)
                                <button
                                    class="bg-gradient-to-b from-blue-500 to-blue-800 flex flex-col justify-center items-center rounded hover:scale-105 duration-300 transition-transform p-2"
                                    wire:click="selectPlan({{ $plan->id }})">
                                    <span class="md:text-xl text-base font-bold text-white">{{ $plan->name }}</span>
                                    <span class="text-2xl font-semibold text-green-400">${{ $plan->price }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </dialog>
                @endteleport
            @endif
            @include('components.checkout.company-form')
        @endif

        @if ($currentStep === 2)
            {{-- Step 2: Address form --}}
            @include('components.checkout.address-form')
        @endif

        @if ($currentStep === 3)
            <!-- Step 3: Payment form -->
            @include('components.checkout.payment-form')
        @endif

        {{-- Checkout navigation --}}
        @include('components.checkout.checkout-navigation')
    </form>
</div>
