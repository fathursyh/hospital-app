<div class="max-w-sm min-h-[50vh] w-full h-max bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700" {{ $attributes }}>
    <a href="{{ route('detail', [$doctor->id]) }}">
        @if ($doctor->avatar?->avatar)
        <img class="rounded-t-lg h-60 object-cover object-top w-full" src="{{ $doctor->avatar->avatar ?? null }}" alt="avatar" referrerpolicy="no-referrer" />
        @else
        <div class="h-60 w-full rounded-t-lg dark:bg-sky-600 bg-sky-300 grid place-items-center">
            <p class="font-bold text-4xl font-madimi-one tracking-widest">{{ Str::of($doctor->name)
                ->explode(' ')
                ->map(fn (string $name) => Str::of($name)->substr(0, 1))
                ->implode('') }}</p>
        </div>
        @endif
    </a>
    <div class="p-5">
        <a href="{{ route('detail', [$doctor->id]) }}">
            <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $doctor->name ?? 'Doctor' }}</h5>
            <h6>Age : {{ $doctor->birthyear ? date('Y') - $doctor->birthyear : '-' }}</h6>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-3 min-h-24">{{ $doctor->about ?? 'No description.' }}</p>
        <a href="{{ route('detail', [$doctor->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>

