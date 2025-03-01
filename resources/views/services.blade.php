<x-layouts.app>
    @section('title')
        Services
    @endsection
    @section('main')
        <section class="w-screen h-[90.4vh] max-h-fit mt-18 grid md:grid-cols-2 grid-cols-1 md:grid-rows-2 grid-rows-4 gap-2 rounded-lg">
            <div class="rounded-lg bg-green-300 dark:bg-green-400 overflow-hidden relative grid place-items-center cursor-pointer">
                <img src="https://images.unsplash.com/photo-1551076805-e1869033e561?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="operation" class="opacity-65 hover:opacity-90">
                <p class="absolute text-blue-500 font-bold md:text-6xl text-5xl drop-shadow-md rounded-lg pointer-events-none">Surgery</p>
            </div>
            <div class="rounded-lg bg-blue-300 dark:bg-blue-400 overflow-hidden relative grid place-items-center cursor-pointer">
                <img src="https://images.unsplash.com/photo-1554734867-bf3c00a49371?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="emergency" class="opacity-65 hover:opacity-90">
                <p class="absolute text-white font-bold md:text-6xl text-5xl drop-shadow-md rounded-lg pointer-events-none">Emergency</p>
            </div>
            <div class="rounded-lg bg-amber-300 dark:bg-amber-400 overflow-hidden relative grid place-items-center cursor-pointer">
                <img src="https://images.unsplash.com/photo-1574043948184-144f2ef80fe3?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="medicine" class="opacity-65 hover:opacity-90">
                <p class="absolute text-blue-500 font-bold md:text-6xl text-5xl drop-shadow-md rounded-lg pointer-events-none">Medicine</p>
            </div>
            <div class="rounded-lg bg-red-300 dark:bg-red-400 overflow-hidden relative grid place-items-center cursor-pointer">
                <img src="https://plus.unsplash.com/premium_photo-1673953510197-0950d951c6d9?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="consultation" class="opacity-65 hover:opacity-90">
                <p class="absolute text-blue-500 font-bold md:text-6xl text-5xl drop-shadow-md rounded-lg pointer-events-none">Consultation</p>
            </div>
        </section>
    @endsection
</x-layouts.app>