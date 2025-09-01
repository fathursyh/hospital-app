<section id="pricing" class="mx-auto max-w-screen-xl bg-gray-50 px-4 py-8 lg:px-6 lg:py-16">
    <div class="mx-auto mb-8 max-w-screen-md text-center lg:mb-12">
        <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900">
            Choose Your Plan
        </h2>
        <p class="mb-5 font-light text-gray-500 sm:text-xl">
            Flexible pricing options to fit hospitals of all sizes
        </p>
    </div>
    <div class="space-y-8 sm:gap-6 lg:grid lg:grid-cols-3 lg:space-y-0 xl:gap-10">
        <!-- Basic Plan -->
        <x-cards.price-card type="Starter" desc="Perfect for small clinics and practices" price="199"
            :advantages="[
                'Up to 50 patients',
                'Basic appointment scheduling',
                'Patient records management',
                'Email support',
            ]" />
        <!-- Professional Plan -->
        <x-cards.price-card type="Professional" desc="Ideal for medium-sized hospitals" price="499"
            :advantages="[
                'Up to 500 patients',
                'Advanced scheduling',
                'Inventory management',
                'Analytics dashboard',
                '24/7 phone support',
            ]"
            :popular="true"
             />
        <!-- Enterprise Plan -->
        <x-cards.price-card type="Enterprise" desc="For large hospital networks" price="1.199" :advantages="[
            'Unlimited patients',
            'Multi-location support',
            'Custom integrations',
            'Advanced security features',
            'Dedicated account manager',
        ]" />
    </div>
</section>
