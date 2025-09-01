<article
    class="min-w-xs lg:min-w-sm {{ $popular ? 'border-blue-600' : 'border-gray-300' }} mx-auto flex max-w-lg flex-col rounded-lg border bg-white p-6 text-center text-gray-900 shadow relative">
    @if ($popular)
        <div class="absolute animate-float -left-4 top-4 -rotate-30 mx-auto rounded-full bg-blue-500 px-3 py-1 text-sm font-medium text-white">Most Popular</div>
    @endif
    <h3 class="mb-4 text-2xl font-semibold">{{ $type }}</h3>
    <p class="font-light text-gray-500 sm:text-lg">{{ $desc }}</p>
    <div class="my-8 flex items-baseline justify-center">
        <span class="mr-2 text-5xl font-extrabold">${{ $price }}</span>
        <span class="text-gray-500">/ month</span>
    </div>
    <ul role="list" class="mb-8 space-y-4 text-left">
        @foreach ($advantages as $item)
            <li class="flex items-center space-x-3">
                <i class="fas fa-check text-green-500"></i>
                <span>{{ $item }}</span>
            </li>
        @endforeach
    </ul>
    <x-ui.button class="mt-auto">Get Started</x-ui.button>
</article>
