<div class="relative max-w-screen-xl space-y-4 overflow-x-auto">
    @include('components.navigations.appointment-tabs')
    <div class="flex items-center justify-between gap-2">
        <div class="flex-1 bg-gray-900 lg:flex-none">
            <div class="relative">
                <div class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="table-search"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 ps-10 pt-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-80 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Search for patient's name" wire:model.live.debounce.500ms="search">
            </div>
        </div>
    </div>
    @if (count($this->appointmentData()) > 0)
        <table class="mb-2 w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="p-4">No</th>
                    <th class="px-6 py-3">Patient Name</th>
                    <th class="px-6 py-3">Gender</th>
                    <th class="px-6 py-3">Appointment Time</th>
                    <th class="px-6 py-3">Appointment Date</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->appointmentData() as $appointment)
                    <tr class="border-b bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-600">
                        <td class="p-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $appointment->patient->name }}
                        </td>
                        <td class="px-6 py-4">
                            @gender($appointment->patient->gender)
                        </td>
                        <td class="px-6 py-4">{{ date('H:i', strtotime($appointment->appointment_time)) }}</td>
                        <td class="px-6 py-4">{{ $appointment->appointment_date }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="@if ($appointment->status === 'scheduled') bg-blue-800
                            @elseif($appointment->status === 'completed')
                                bg-green-800
                                @else
                                bg-red-800 @endif rounded px-2 py-1 capitalize text-white">{{ $appointment->status }}</span>
                        </td>
                        <td class="flex space-x-2 px-6 py-4">
                            @if ($appointment->status === 'scheduled')
                                <button class="rounded bg-green-500 p-2 text-white hover:bg-green-600" title="Complete"
                                    wire:click="changeStatus('{{ $appointment->id }}', 'completed')"
                                    wire:confirm="Set this appointment status to completed?">
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="rounded bg-red-500 p-2 text-white hover:bg-red-600" title="Cancel"
                                    wire:click="changeStatus('{{ $appointment->id }}', 'cancelled')"
                                    wire:confirm="Cancel this appointment?">
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M5 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm-2 9a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1Zm13-6a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-4Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else
                                <button class="rounded bg-blue-500 p-2 text-white hover:bg-blue-600"
                                    title="Revert status"
                                    wire:click="changeStatus('{{ $appointment->id }}', 'scheduled')"
                                    wire:confirm="Revert status back to scheduled?">
                                    <svg class="h-4 w-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m15 19-7-7 7-7" />
                                    </svg>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-white">No Data</p>
    @endif
</div>
