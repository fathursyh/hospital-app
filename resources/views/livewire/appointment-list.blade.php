<div class="w-full h-fit p-4 flex gap-4 flex-wrap ">
    @foreach ($list as $patient)
        
    <x-appointment-card :patient="$patient" />
    @endforeach
</div>
