<form class="h-full w-xl mx-auto border border-gray-400 shadow-md rounded p-8 space-y-4" wire:submit.prevent="submitHandle">
    <h2 class="font-bold text-2xl text-center">Patient Appointment Form</h2>
    @if ($currentStep === 1)
        @include('components.patient.patient-data-form')
    @else
        @include('components.patient.appointment-form')
    @endif
</form>
