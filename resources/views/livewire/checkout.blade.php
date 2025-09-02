<div class="h-[80vh] rounded border border-gray-300 bg-white p-8 shadow">

    {{-- progress --}}
    @include('components.checkout.progress-bar')

    {{-- forms --}}
    <form wire:submit="submit">
        @if ($currentStep === 1)
            {{-- Step 1: Company form --}}
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
