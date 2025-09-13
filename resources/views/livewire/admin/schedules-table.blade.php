<div class="max-w-screen-xl relative">

    @teleport('body')
        <dialog class="modal fixed lg:min-w-md min-w-sm z-40 top-[50%] left-[50%] translate-[-50%] shadow-md"
            @if ($showModal) open @endif x-on:close="$wire.resetForm()">
            <div wire:click.outside="closeModal">
                @include('components.admin.schedules-form')
            </div>
        </dialog>
    @endteleport

   @include('components.admin.schedule-header')

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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
