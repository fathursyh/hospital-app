<div class="relative max-w-screen-xl overflow-x-auto">
    <div class="flex justify-between items-center gap-2 pb-4">
        <div class="bg-gray-900 flex-1 lg:flex-none">
            <div class="relative">
                <div class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="table-search"
                    class="block w-full lg:w-80 rounded-lg border border-gray-300 bg-gray-50 ps-10 pt-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Search for patients">
            </div>
        </div>
    </div>

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
            @foreach ($appointmentData as $appointment)
                <tr class="border-b bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <td class="p-4">1</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $appointment->patient->name }}
                    </td>
                    <td class="px-6 py-4">
                        @gender($appointment->patient->gender)
                    </td>
                    <td class="px-6 py-4">{{ date("H:i", strtotime($appointment->appointment_time)) }}</td>
                    <td class="px-6 py-4">{{ $appointment->appointment_date }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded bg-yellow-500 text-white">{{ $appointment->status }}</span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="rounded bg-blue-500 p-2 text-white hover:bg-blue-600" title="Detail">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Delete Button -->
                        <button class="rounded bg-green-500 p-2 text-white hover:bg-green-600" title="Accept">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
