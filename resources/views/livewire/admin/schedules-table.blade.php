    <div class="max-w-screen-xl relative">
        @teleport('body')
            <dialog class="modal fixed lg:min-w-md min-w-sm z-40 top-[50%] left-[50%] translate-[-50%] shadow-md"
                @if ($showModal) open @endif x-on:close="$wire.resetForm()">
                <div wire:click.outside="closeModal">
                    @include('components.admin.schedules-form')
                </div>
            </dialog>
        @endteleport
        <!-- Action Bar -->
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Schedule Overview</h2>
                <p class="text-gray-600 dark:text-gray-400">Manage doctor schedules and availability</p>
            </div>

            <!-- Create New Schedule Button -->
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                type="button" wire:click="openModal">
                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create New Schedule
            </button>
        </div>

        <!-- Filters -->
        <div class="mb-4 bg-white rounded-lg shadow p-4 dark:bg-gray-800">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Doctor</label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>All Doctor</option>
                        @foreach ($doctorSchedules as $doctor)
                            <option value="{{ $doctor['id'] }}">{{ $doctor['user']['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach (array_unique(array_map(fn($item) => $item['specialization'], $doctorSchedules)) as $specialization)
                            <option value="{{ $specialization }}">{{ $specialization }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Week</label>
                    <input type="week"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="flex items-end">
                    <button type="button"
                        class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                        Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Schedule Table -->
        <div class="bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="p-4">
                <div class="relative overflow-x-auto rounded">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Doctor</th>
                                <th scope="col" class="px-6 py-3">Department</th>
                                <th scope="col" class="px-6 py-3">Monday</th>
                                <th scope="col" class="px-6 py-3">Tuesday</th>
                                <th scope="col" class="px-6 py-3">Wednesday</th>
                                <th scope="col" class="px-6 py-3">Thursday</th>
                                <th scope="col" class="px-6 py-3">Friday</th>
                                <th scope="col" class="px-6 py-3">Saturday</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctorSchedules as $schedule)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Dr.
                                            {{ $schedule['user']['name'] }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $schedule['specialization'] }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-green-600 dark:text-green-400 font-medium">
                                        @php
                                            $monday = array_find(
                                                $schedule['schedules'],
                                                fn($item) => $item['day_of_week'] === 'Monday',
                                            );
                                        @endphp
                                        @if ($monday)
                                            {{ substr($monday['start_time'], 0, -3) . ' - ' . substr($monday['end_time'], 0, -3) }}
                                        @else
                                            <span class="text-sm text-red-600 dark:text-red-400">
                                                Off
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-green-600 dark:text-green-400 font-medium">
                                        @php
                                            $tuesday = array_find(
                                                $schedule['schedules'],
                                                fn($item) => $item['day_of_week'] === 'Tuesday',
                                            );
                                        @endphp
                                        @if ($tuesday)
                                            {{ substr($tuesday['start_time'], 0, -3) . ' - ' . substr($tuesday['end_time'], 0, -3) }}
                                        @else
                                            <span class="text-sm text-red-600 dark:text-red-400">
                                                Off
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-green-600 dark:text-green-400 font-medium">
                                        @php
                                            $wednesday = array_find(
                                                $schedule['schedules'],
                                                fn($item) => $item['day_of_week'] === 'Wednesday',
                                            );
                                        @endphp
                                        @if ($wednesday)
                                            {{ substr($wednesday['start_time'], 0, -3) . ' - ' . substr($wednesday['end_time'], 0, -3) }}
                                        @else
                                            <span class="text-sm text-red-600 dark:text-red-400">
                                                Off
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-green-600 dark:text-green-400 font-medium">
                                        @php
                                            $thursday = array_find(
                                                $schedule['schedules'],
                                                fn($item) => $item['day_of_week'] === 'Thursday',
                                            );
                                        @endphp
                                        @if ($thursday)
                                            {{ substr($thursday['start_time'], 0, -3) . ' - ' . substr($thursday['end_time'], 0, -3) }}
                                        @else
                                            <span class="text-sm text-red-600 dark:text-red-400">
                                                Off
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-green-600 dark:text-green-400 font-medium">
                                        @php
                                            $friday = array_find(
                                                $schedule['schedules'],
                                                fn($item) => $item['day_of_week'] === 'Friday',
                                            );
                                        @endphp
                                        @if ($friday)
                                            {{ substr($friday['start_time'], 0, -3) . ' - ' . substr($friday['end_time'], 0, -3) }}
                                        @else
                                            <span class="text-sm text-red-600 dark:text-red-400">
                                                Off
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-green-600 dark:text-green-400 font-medium">
                                        @php
                                            $saturday = array_find(
                                                $schedule['schedules'],
                                                fn($item) => $item['day_of_week'] === 'Saturday',
                                            );
                                        @endphp
                                        @if ($saturday)
                                            {{ substr($saturday['start_time'], 0, -3) . ' - ' . substr($saturday['end_time'], 0, -3) }}
                                        @else
                                            <span class="text-sm text-red-600 dark:text-red-400">
                                                Off
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <button
                                                class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
