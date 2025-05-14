<div class="h-full">
    @if (count($patients) < 1)
        <div class="w-full h-full grid place-items-center font-bold text-xl text-gray-600 dark:text-gray-400">
            <span>No Data.</span>
        </div>
    @else
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-600 text-white dark:bg-gray-800">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-600 text-white dark:bg-gray-800">
                        Full Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-600 text-white dark:bg-gray-800">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-600 text-white dark:bg-gray-800">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-600 text-white dark:bg-gray-800">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-600 text-white dark:bg-gray-800">
                        Reason
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-600 text-white dark:bg-gray-800">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 odd:bg-gray-100 odd:dark:bg-gray-900 even:bg-gray-300 even:dark:bg-gray-800">
                    <td class="px-6 py-4">
                        {{ $patients->firstItem() + $loop->index }}
                    </td>
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white hover:scale-110 transition-transform duration-150">
                        <a href="{{ route('patient-detail', $patient->id_patient) }}" class="hover:underline underline-offset-4">
                            {{ $patient->fullname }}
                        </a>
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap {{ $patient->gender === 'm' ? 'text-green-600 dark:text-green-500' : 'text-pink-400' }}">
                        {{ $patient->gender === 'm' ? 'Male' : 'Female'}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $patient->date}}
                    </td>
                    <td class="px-6 py-4 ">
                        {{ $patient->phone }}
                    </td>
                    <td class="px-6 py-4 line-clamp-3">
                        {{ $patient->reason }}
                    </td>
                    <td class="px-6 py-4 " >
                        <button class="hover:scale-110 cursor-pointer disabled:cursor-not-allowed text-white bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-blue-800 {{ $patient->status === 'book' ? '' : ($patient->status === 'taken' ? 'bg-yellow-800' : 'bg-gray-700') }}" wire:confirm="Take this patient?" wire:click="takePatient('{{ $patient->id_patient }}')"
                        @if ($patient->status !== 'book')
                            disabled
                        @endif
                        >
                        {{ $patient->status }}

                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="max-w-screen ms-auto my-4">
            {{ $patients->links() }}
        </div>
    </div>
    @endif

</div>
