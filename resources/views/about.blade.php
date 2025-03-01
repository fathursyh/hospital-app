<x-layouts.app>
    @section('title')
        About
    @endsection
    @section('main')
        <div class="mt-18 w-screen">
            <div class="container mx-auto my-10 px-4">
                <section class="bg-white dark:bg-zinc-900 shadow-md rounded-lg p-6">
                    <img src="https://plus.unsplash.com/premium_photo-1681842978092-3af31637042a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="doctor and pasien image from unsplash" referrerpolicy="no-referrer" class="w-full h-44 md:h-80 object-cover overflow-hidden mb-4 rounded" style="object-position: 0px -4rem">
                    <h2 class="text-3xl font-semibold">About Us</h2>
                    <p class="mt-4">
                        At [Hospital Name], we are committed to providing exceptional healthcare services to our community. Our team of dedicated professionals works tirelessly to ensure that every patient receives the highest quality of care in a compassionate and respectful environment.
                    </p>
                    <p class="mt-4">
                        Established in [Year], our hospital has grown to become a leading healthcare provider in the region. We offer a wide range of medical services, including emergency care, surgery, maternity, and specialized treatments, all designed to meet the diverse needs of our patients.
                    </p>
                    <p class="mt-4">
                        Our state-of-the-art facilities are equipped with the latest technology, and our staff is continuously trained in the best practices to ensure that we remain at the forefront of medical advancements.
                    </p>
                </section>
        
                <section class="mt-10 bg-white dark:bg-zinc-900 shadow-md rounded-lg p-6">
                    <h2 class="text-3xl font-semibold ">Our Mission</h2>
                    <p class="mt-4">
                        Our mission is to provide comprehensive, patient-centered healthcare that improves the health and well-being of our community. We strive to create a safe and welcoming environment for all patients and their families.
                    </p>
                </section>
        
                <section class="mt-10 bg-white dark:bg-zinc-900 shadow-md rounded-lg p-6">
                    <h2 class="text-3xl font-semibold ">Our Values</h2>
                    <ul class="mt-4 list-disc list-outside ps-4">
                        <li>Compassion: We treat our patients with kindness and empathy.</li>
                        <li>Integrity: We uphold the highest standards of professionalism and ethics.</li>
                        <li>Excellence: We are committed to continuous improvement and innovation.</li>
                        <li>Collaboration: We work together as a team to provide the best care possible.</li>
                    </ul>
                </section>
            </div>
        </div>
    @endsection
</x-layouts.app>
