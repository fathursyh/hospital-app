<x-layouts.app>
    @section('title')
        Our Team
    @endsection
    @section('main')
        <div class="mt-18 flex flex-col mx-auto max-w-screen-xl 2xl:min-h-[80vh] gap-2 mb-5">
            <div class="w-full h-20 bg-linear-to-b from-cyan-400 to-blue-500 md:rounded-lg grid place-items-center row-span-1">
                <h3 class="text-white font-madimi-one md:text-4xl text-2xl [text-shadow:_0_2px_1px_black]">Meet Our Professional Doctors</h3>
            </div>
            {{-- content --}}
            <div class="w-full h-full row-span-4 shadow-lg border-gray-200 dark:border-zinc-900 border rounded-lg grid md:grid-cols-3 md:gap-4 gap-8 place-items-center p-4">
                @foreach ($data as $item)
                <x-doctor-card :doctor='$item' />
                @endforeach
            </div>
        </div>
    @endsection
</x-layouts.app>
