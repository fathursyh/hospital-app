<section class="w-full h-full bg-gray-100 dark:bg-zinc-700 shadow rounded-lg rounded-bl-none grid grid-rows-3 overflow-hidden box-border">
    <div class="flex flex-col justify-center items-center bg-blue-400 dark:bg-blue-500 row-span-1">
        <h6 class="font-bold lg:text-4xl text-2xl text-gray-100">{{ $count }}</h6>
        <p class="text-gray-100 lg:text-xl text-lg">Your Patients</p>
    </div>
    <div class="row-span-2 p-4">
        <div class="w-full h-full flex flex-col justify-start 2xl:justify-evenly">
            @foreach ($latest as $item)
            <a href="/">
                <div class="grid grid-cols-2 divide-x-2 {{ date_create($item->patient->date) < date_create() ? 'bg-red-300 dark:bg-red-800/60' : 'bg-white dark:bg-zinc-800' }} border rounded hover:bg-blue-100 dark:hover:bg-blue-900">
                    <p class="py-2 px-4 flex items-center">{{ $item->patient->fullname }}</p>
                    <p class="py-2 px-4 flex items-center">{{ date_create($item->patient->date)->format('l, d F') }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
