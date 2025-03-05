<section class="w-full h-full bg-gray-100 dark:bg-zinc-700 shadow rounded-lg rounded-bl-none grid grid-rows-3 overflow-hidden box-border">
    <div class="flex flex-col justify-center items-center bg-blue-400 dark:bg-blue-500 row-span-1">
        <h6 class="font-bold lg:text-4xl text-2xl text-gray-600">{{ $count }}</h6>
        <p class="text-gray-100 lg:text-xl text-lg">On-going Patients</p>
    </div>
    <div class="row-span-2 p-4">
        <h5 class="lg:text-2xl text-lg mb-2">Patients</h5>
        <div class="w-full h-full flex flex-col gap-1">
            @foreach ($latest as $item)
            <a href="/">
                <div class="grid grid-cols-2 divide-x-2 bg-white dark:bg-zinc-800 border rounded hover:bg-blue-100 dark:hover:bg-blue-900">
                    <p class="py-2 px-4 flex items-center">{{ $item->fullname }}</p>
                    <p class="py-2 px-4 flex items-center">{{ date_create($item->date)->format('l, d F') }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
