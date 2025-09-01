  <section class="bg-blue-50 py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6" data-aos="zoom-out">
        <div class="max-w-screen-md mb-8 lg:mb-16 mx-auto text-center">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">
                Trusted by Healthcare Professionals
            </h2>
        </div>
        <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-4">
            <div class="text-center">
                <div class="text-3xl font-extrabold text-blue-600 mb-2" data-target="500" data-suffix="+">0</div>
                <div class="text-sm">Hospitals Using</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-extrabold text-green-600 mb-2" data-target="2000000" data-suffix="+" data-format="M">0</div>
                <div class="text-sm">Patients Managed</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-extrabold text-purple-600 mb-2" data-target="99.9" data-suffix="%" data-decimal="1">0</div>
                <div class="text-sm">Uptime</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-extrabold text-red-600 mb-2" data-target="24" data-suffix="/7">0</div>
                <div class="text-sm">Support</div>
            </div>
        </div>
    </section>
   <script>
        // Counter animation function
        function animateCounter(element, target, duration = 1400) {
            const start = 0;
            const increment = target / (duration / 16); // 60fps
            let current = start;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }

                const suffix = element.getAttribute('data-suffix') || '';
                const format = element.getAttribute('data-format');
                const decimal = element.getAttribute('data-decimal');

                let displayValue = current;

                // Handle formatting
                if (format === 'M' && current >= 1000000) {
                    displayValue = (current / 1000000).toFixed(1) + 'M';
                } else if (decimal) {
                    displayValue = current.toFixed(parseInt(decimal));
                } else {
                    displayValue = Math.floor(current);
                }

                element.textContent = displayValue + suffix;
            }, 16);
        }

        function initCounterAnimation() {
            const counters = document.querySelectorAll('[data-target]');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                        const target = parseFloat(entry.target.getAttribute('data-target'));
                        animateCounter(entry.target, target);
                        entry.target.classList.add('animated');
                    }
                });
            }, {
                threshold: 0.5,
                rootMargin: '0px 0px -100px 0px'
            });

            counters.forEach(counter => observer.observe(counter));
            document.removeEventListener('DOMContentLoaded', initCounterAnimation);
        }

        document.addEventListener('DOMContentLoaded', initCounterAnimation);
    </script>
