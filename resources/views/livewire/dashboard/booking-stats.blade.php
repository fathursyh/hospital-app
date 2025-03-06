<section class="w-full h-full grid place-items-center bg-zinc-700 shadow rounded-lg rounded-br-none overflow-hidden">
    <div class="h-52 xl:h-72 w-full p-4 grid place-items-center">
        <canvas id="bookingStats" class="w-full"></canvas>

    </div>
    @push('admin-scripts')

        <script>
            const ctx = document.getElementById('bookingStats');
            Chart.defaults.color='white';
            Chart.defaults.font.size = 16;
            Chart.defaults.borderColor = '#848abd';
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($date) !!},
                    datasets: [{
                        label: 'Patient',
                        data: {!! json_encode($data) !!},
                        borderWidth: 1,
                        backgroundColor: ['gray', 'gray', '#6fa87f', '#4fc26e'],
                        color: '#a8327b',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 14
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                    }
                },
            });
        </script>
    @endpush
</section>
