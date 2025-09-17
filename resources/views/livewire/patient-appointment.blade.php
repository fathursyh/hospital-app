<form class="h-full w-2xl mx-auto border border-gray-600 shadow rounded p-6 space-y-4">
    <h1 class="font-bold text-2xl text-center">Patient Appointment Form</h1>
    <x-ui.custom-input id="name" label="Fullname" name="name" type="text" placeholder="Enter your fullname"
        wire:model.defer="name" wire:loading.disabled />
    <x-ui.custom-input id="date" label="Date" name="date" type="datetime-local" placeholder="Enter appointment date"
        wire:model.defer="date" wire:loading.disabled />
    <x-ui.custom-input id="reason" label="Reason" name="reason" type="text" placeholder="Enter your appointment reason"
        wire:model.defer="reason" wire:loading.disabled />
</form>
