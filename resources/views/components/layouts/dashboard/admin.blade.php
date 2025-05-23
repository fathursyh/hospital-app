<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F-hospital - {{ Auth::user()->name }}</title>
    @include('partials.head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include('components.nav.dashboard-navbar')
        {{ $slot }}

        <livewire:alert />
    @if (session()->has('status'))
        <x-flash-message :message="session('status')" />
    @endif
    @stack('scripts')
</body>

</html>
