<section
    class="w-full min-h-48 h-full bg-zinc-700 shadow rounded-lg rounded-bl-none flex flex-col overflow-hidden box-border text-white">
    <h3 class="text-center py-4 text-xl font-semibold ">{{ date('F') }} </h3>
    <div class="bg-zinc-500 h-full grid grid-cols-5 grid-rows-7 gap-0 overflow-auto">
        @php
            $j = 1;
            $next = false;
        @endphp
        @for($i = 1; $i < 36; $i++)
                <div
                    class="flex justify-start gap-2 items-end border-gray-400 border text-xs {{ $next ? 'bg-gray-300' : 'bg-white' }} text-black p-2 hover:bg-gray-400">
                    {{ $j }}
                    @if (in_array($j, $appoints))
                        <span class="w-2 h-2 rounded-full bg-red-300"></span>
                    @endif
                    @if ($j == date('d'))
                    <svg class="w-6 h-6 inline text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                      </svg>
                      
                    @endif
                </div>
                @php
                    if ($j === $calendar) {
                        $j = 0;
                        $next = true;
                    }
                    $j++;
                @endphp
        @endfor
    </div>
</section>