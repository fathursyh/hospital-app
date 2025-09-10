<div class="relative max-w-screen-xl overflow-x-auto">
    @teleport('body')
        <dialog class="modal fixed lg:min-w-md min-w-sm z-40 top-[50%] left-[50%] translate-[-50%] shadow-md"
            @if ($showModal) open @endif x-on:close="$wire.resetForm()">
            <div wire:click.outside="closeModal">
                @include('components.admin.new-doctor-form')
            </div>
        </dialog>
    @endteleport
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
                    placeholder="Search for doctor names" wire:model.live.debounce.500ms="search">
            </div>
        </div>
        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            type="button" wire:click="openModal">
            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Create New Doctor
        </button>
    </div>

    <table class="mb-2 w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Specialization
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr
                    class="border-b border-gray-200 bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $doctor->user->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $doctor->specialization }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $doctor->phone }}
                    </td>
                    <td class="px-6 py-4">
                        <button class="rounded bg-blue-600 px-3 py-1 text-sm font-medium text-white hover:bg-blue-700">
                            Detail
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
