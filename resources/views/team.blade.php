<x-layouts.app>
    @section('title')
        Our Team
    @endsection
    @section('main')
        <div class="mt-18 grid grid-rows-5 mx-auto max-w-screen-xl min-h-[80vh] gap-2 mb-5">
            <div class="w-full h-full bg-linear-to-b from-cyan-400 to-blue-500 rounded-lg grid place-items-center">
                <h3 class="text-white font-madimi-one text-4xl [text-shadow:_0_2px_1px_black]">Meet Our Professional Doctors</h3>
            </div>
            {{-- content --}}
            <div class="w-full h-full row-span-5 shadow-lg border-gray-200 border rounded-lg flex flex-row flex-wrap gap-2 p-4">
                @foreach ($data as $item)
                <x-doctor-card :doctor='$item' />
                @endforeach
            </div>
        </div>
    @endsection
</x-layouts.app>
