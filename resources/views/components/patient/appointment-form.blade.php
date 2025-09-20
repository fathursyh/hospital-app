@php
    $today = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    $twoWeek = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    $today->modify('+1 day');
    $twoWeek->modify('+14 days');
@endphp
<button class="text-sm underline underline-offset-2 text-blue-600 flex gap-1 items-center" type="button"
    wire:click="previousStep">
    <span>
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 12h14M5 12l4-4m-4 4 4 4" />
        </svg>

    </span>
    Patient data
</button>
<x-ui.custom-input id="date" label="Date & Time" name="date" type="datetime-local"
    min="{{ $today->format('Y-m-d\TH:i') }}" max="{{ $twoWeek->format('Y-m-d\TH:i') }}"
    placeholder="Enter appointment date" wire:model.live.debounce.250ms="date" wire:loading.disabled />
<x-ui.custom-input id="doctor" :label="'Available Doctor (' . count($this->doctorSchedule()) . ')'" name="doctor" placeholder="Select Your Doctor" type="select"
    wire:model.defer="doctor" wire:loading.disabled>
    <option value="" selected>-- Select Your Doctor --</option>
    @foreach ($this->doctorSchedule() as $option)
        <option value="{{ $option->id }}">{{ $option->user->name }}</option>
    @endforeach
</x-ui.custom-input>
<x-ui.custom-input id="reason" label="Reason" name="reason" type="paragraph"
    placeholder="Enter your reasons or symptoms" wire:model.defer="reason" wire:loading.disabled />
<x-ui.button class="w-full mt-4" type="submit">Book Now</x-ui.button>
