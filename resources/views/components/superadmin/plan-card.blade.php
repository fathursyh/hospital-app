@props(['name', 'price', 'features'])
<article class="flex h-[400px] flex-col rounded-lg bg-gray-800 md:p-10 p-8 shadow-lg space-y-2">
    <h2 class="text-center text-3xl font-bold text-gray-200">{{ $name }}</h2>
    <p class="mb-4 text-center text-xl font-black text-green-500">{{ Number::currency($price, '', 'US', 0) }}
    </p>
    <ul class="flex-1 list-outside list-['✔'] text-gray-300 text-sm">
        <li class="ps-2">features Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, neque?</li>
        <li class="ps-2">features Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, neque?</li>
        <li class="ps-2">features Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, neque?</li>
    </ul>
    <a href="">
        <x-ui.button class="bg-gray-500! py-3.5! hover:bg-gray-600! w-full shadow-[inset_4px_4px_8px_-6px_white]">
            Edit Plan
        </x-ui.button>
    </a>
</article>
