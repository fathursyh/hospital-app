<div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow-sm w-60 dark:bg-gray-700">
    <ul class="h-48 px-3 py-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
        aria-labelledby="dropdownSearchButton">
        @foreach (DAYS as $day)
        <li>
            <div class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                <input id="day-{{ $loop->iteration }}" type="checkbox" value="{{ $day }}" wire:model="dayFilter"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="checkbox-item-11"
                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                    {{ $day }}
                </label>
            </div>
        </li>
        @endforeach
    </ul>
</div>
