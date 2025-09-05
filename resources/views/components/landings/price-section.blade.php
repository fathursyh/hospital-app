<section id="pricing" class="mx-auto max-w-screen-xl gradient-bg px-4 py-8 lg:px-6 lg:py-16 rounded" data-aos="fade-up">
    <div class="mx-auto mb-8 max-w-screen-md text-center lg:mb-12">
        <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-50">
            Choose Your Plan
        </h2>
        <p class="mb-5 font-light text-gray-200 sm:text-xl">
            Flexible pricing options to fit hospitals of all sizes
        </p>
    </div>
    <div class="space-y-8 sm:gap-6 lg:grid lg:grid-cols-3 lg:space-y-0 xl:gap-10">
        <!-- Basic Plan -->
        <x-cards.price-card :type="$plans[0]->name" desc="Perfect for small clinics and practices" :price="$plans[0]->price" :advantages="$plans[0]->features" />
        <!-- Professional Plan -->
        <x-cards.price-card :type="$plans[1]->name" desc="Ideal for medium-sized hospitals" :price="$plans[1]->price" :advantages="$plans[1]->features" :popular="true"/>
        <!-- Enterprise Plan -->
        <x-cards.price-card :type="$plans[2]->name" desc="For large hospital networks" :price="$plans[1]->price" :advantages="$plans[2]->features" />
    </div>
</section>
