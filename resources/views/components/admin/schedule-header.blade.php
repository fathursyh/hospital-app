<!-- Action Bar -->
<div class="mb-4 flex items-center justify-between">
    <div>
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Schedule Overview</h2>
        <p class="text-gray-600 dark:text-gray-400">Manage doctor schedules and availability</p>
    </div>

    <!-- Create New Schedule Button -->
    <button
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex gap-2 items-center disabled:cursor-not-allowed! disabled:bg-gray-600!"
        type="button" wire:click="openModal"
        @if (count($doctorSchedules) === 0)
            disabled
        @endif
        >
        <svg class="w-4 h-4 inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                clip-rule="evenodd" />
            <path fill-rule="evenodd"
                d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                clip-rule="evenodd" />
        </svg>
        Update Schedule
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
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 capitalize">
                @foreach ($specializations as $specialization)
                    <option class="capitalize" value="{{ $specialization }}">{{ $specialization }}</option>
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
