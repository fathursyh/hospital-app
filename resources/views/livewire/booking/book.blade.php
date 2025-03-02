<x-layouts.app>
    @section('title')
        Booking Appointment
    @endsection
    @section('main')
        <div class="h-screen grid place-items-center pt-18">
            <livewire:book-form />
        </div>

        <script>
            const datepickerEl = document.getElementById('date');

            datepickerEl.addEventListener('changeDate', (event) => {
                window.livewire.emit('dateSelected', event.detail.date);
            });
        </script>
    @endsection
</x-layouts.app>
