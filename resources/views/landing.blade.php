@extends('layouts.app-layout')
@section('title')Home @endsection
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
    @include('components.landings.whatsapp-button')
@endsection
