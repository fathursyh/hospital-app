<x-layouts.dashboard.admin>
    <div class="p-4 xl:ml-64 h-full">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 h-full box-border grid md:grid-cols-2 gap-4 mb-4 place-items-center w-full">
                <livewire:dashboard.booking-stats />
                <livewire:dashboard.patient-stats />
                <livewire:dashboard.appointment-stats />
                <livewire:dashboard.service-stats />
        </div>
    </div>
</x-layouts.dashboard.admin>
