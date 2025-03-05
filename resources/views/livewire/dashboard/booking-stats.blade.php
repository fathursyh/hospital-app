<section class="w-full h-full grid place-items-center bg-zinc-700 shadow rounded-lg rounded-br-none">
    <div class="h-fit w-full flex flex-col items-center px-10">
        <h3 class="text-xl font-roboto font-bold text-gray-100">Patient Stats</h3>
        <canvas id="bookingStats" class="h-full"></canvas>
    </div>
    {{-- {{ $days }} --}}
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