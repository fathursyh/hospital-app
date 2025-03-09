<article
    class="min-h-60 w-80 border border-gray-400 shadow-md rounded-lg p-4 hover:scale-105 transition-transform duration-300">
    <div class="flex gap-2 justify-center">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer" wire:click="finishPatient('{{ $patient->id_patient }}')">Finish</button>
        <a href="{{ route('patient-detail', $patient->id_patient) }}" type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Detail</a>

    </div>
    <div class="mb-1">
        <h5 class="text-gray-500">Name</h5>
        <p>{{ $patient->patient->fullname }}</p>
    </div>
    <div class="mb-1">
        <h5 class="text-gray-500">Gender</h5>
        <p>{{ $patient->patient->gender === 'm' ? 'Male' : 'Female' }}</p>
    </div>
    <div class="mb-1    ">
        <h5 class="text-gray-500">Phone</h5>
        <p>{{ $patient->patient->phone }}</p>
    </div>
    <p class="border-t-2 border-dotted border-gray-600 text-pretty line-clamp-3">{{ $patient->patient->reason }}</p>
  
</article>