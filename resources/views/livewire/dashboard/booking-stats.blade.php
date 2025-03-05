<section class="w-full h-full grid place-items-center bg-zinc-700 shadow rounded-lg rounded-br-none">
    <div class="h-fit overflow-x-hidden flex flex-col gap-4 items-center p-4">
        <h3 class="md:text-xl text-base font-roboto font-bold text-gray-100">Patient Stats</h3>
        <div class="2xl:w-[40rem] xl:w-[28rem] w-[20rem] h-full px-2">
            <canvas id="bookingStats" class="h-full"></canvas>
        </div>
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
                    responsive: true,
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
