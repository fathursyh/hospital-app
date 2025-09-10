<form class="space-y-2 w-full bg-white rounded p-8">
    <h2 class="text-xl font-bold text-center">New Schedule</h2>
    <x-ui.custom-input
        id="doctor_id"
        label="Doctor"
        name="doctorId"
        type="select"
        wire:model.defer="doctorId"
        wire:loading.disabled>
         @foreach ($doctorSelect ?? [] as $id => $name)
             <option value="{{ $id }}">Dr. {{ $name}}</option>
         @endforeach
    </x-ui.custom-input>
    <x-ui.custom-input
        id="day-of-week"
        label="Day"
        name="day"
        type="select"
        wire:model.defer="day"
        wire:loading.disabled>
         @foreach (DAYS as $day)
             <option value="{{ $day }}">{{ $day }}</option>
         @endforeach
    </x-ui.custom-input>
    <x-ui.custom-input
        id="start-date"
        label="Start Time"
        name="startTime"
        type="time"
        wire:model.defer="startTime"
        wire:loading.disabled />
    <x-ui.custom-input
        id="end-date"
        label="End Time"
        name="endTime"
        type="time"
        wire:model.defer="endTime"
        wire:loading.disabled />
    <x-ui.custom-input
        id="available"
        class="w-fit! aspect-square"
        label="Available"
        name="available"
        type="checkbox"
        wire:model="available"
        wire:loading.disabled />
    <x-ui.button type="submit" class="w-full">Create</x-ui.button>

</form>
