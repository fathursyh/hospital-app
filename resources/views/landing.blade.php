@extends('layouts.app-layout')
@section('title', 'Home')
@section('main-content')
    <!-- Hero Section -->
    @include('components.landings.hero-section')

    <!-- Features Section -->
    @include('components.landings.features-section')

    <!-- Statistics Section -->
    @include('components.landings.statistics-section')

    <!-- About Section -->
    @include('components.landings.about-section')

    <!-- Pricing Section -->
    @include('components.landings.price-section')

    <!-- Testimonials -->
    @include('components.landings.testimonial-section')

    <!-- CTA Section -->
    @include('components.landings.cta-section')

    {{-- floating --}}
    @include('components.landings.floating-buttons')
@endsection

<script>
    function topButtonEvent() {
        const hero = document.getElementById("hero");
        const about = document.getElementById("about");
        const topButton = document.getElementById("top-button");

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    if (entry.target.id === "hero") topButton.classList.add("hidden");
                    else topButton.classList.remove("hidden");
                }
            });
        });

        [hero, about].forEach((item) => observer.observe(item));
    }
    document.addEventListener('DOMContentLoaded', topButtonEvent);
</script>
