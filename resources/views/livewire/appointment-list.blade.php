<div class="mt-10 md:mt-0 pb-10">
    <div class="w-[99%] xl:w-full 2xl:w-[99%] mx-auto h-fit flex gap-3 flex-wrap ">
        @foreach ($list as $patient)
            <x-appointment-card :patient="$patient" />
        @endforeach
    </div>
</div>
