<form class="h-full w-xl mx-auto border border-gray-400 shadow-md rounded p-8 space-y-4"
    wire:submit.prevent="submitHandle">
    <h1 class="font-bold text-2xl text-center">Patient Appointment Form</h1>
    <x-ui.custom-input id="name" label="Full Name" name="name" type="text" placeholder="Enter your fullname"
        wire:model.defer="name" wire:loading.disabled />
    <x-ui.custom-input id="date" label="Date & Time" name="date" type="datetime-local"
        placeholder="Enter appointment date" wire:model.live.debounce.250ms="date" wire:loading.disabled />
    <x-ui.custom-input id="doctor" :label="'Available Doctor ('. count($this->doctorSchedule()) . ')' " name="doctorId" placeholder="Select Your Doctor" type="select"
        wire:model.defer="doctorId" wire:loading.disabled>
        <option value="" selected>-- Select Your Doctor --</option>
        @foreach ($this->doctorSchedule() as $option)
            <option value="{{ $option->id }}">{{ $option->user->name }}</option>
        @endforeach
    </x-ui.custom-input>
    <x-ui.custom-input id="reason" label="Reason" name="reason" type="paragraph"
        placeholder="Enter your reasons or symptoms" wire:model.defer="reason" wire:loading.disabled />
    <x-ui.button class="w-full mt-4">Book</x-ui.button>
</form>
