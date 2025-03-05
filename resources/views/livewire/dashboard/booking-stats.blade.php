<section class="w-full h-full grid place-items-center bg-gray-100 dark:bg-zinc-700 shadow rounded-lg rounded-br-none">
    <canvas id="bookingStats" class="h-full"></canvas>
    {{-- {{ $days }} --}}
    @push('admin-scripts')

        <script>
            const ctx = document.getElementById('bookingStats');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($date) !!},
                    datasets: [{
                        label: 'Patient',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</section>
