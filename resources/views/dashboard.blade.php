<x-layouts.dashboard.admin>
    <div class="p-4 md:ml-64 md:h-screen h-full overflow-hidden">
        <div class="container p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 box-border grid lg:grid-cols-2 lg:grid-rows-2 gap-4 mb-4 place-items-center w-full h-full">
                <livewire:dashboard.booking-stats />
                <livewire:dashboard.service-stats />
                <livewire:dashboard.appointment-stats />
                <livewire:dashboard.patient-stats />
        </div>
    </div>
</x-layouts.dashboard.admin>
