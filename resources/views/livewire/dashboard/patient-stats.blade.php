<section class="w-full min-h-full bg-gray-100 dark:bg-zinc-700 shadow rounded-lg rounded-bl-none grid grid-rows-3 overflow-hidden">
    <div class="flex flex-col justify-center items-center gap-2 {{ $this->status }} row-span-1">
        <h6 class="font-bold text-4xl text-white">{{ $patients }}</h6>
        <p class="text-gray-600 text-xl">Unhandled Patients</p>
    </div>
    <div class="p-6 row-span-2">
        <h5 class="text-2xl mb-2">Latest Patients</h5>
        <div class="w-full h-full grid grid-rows-5 gap-1">
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
