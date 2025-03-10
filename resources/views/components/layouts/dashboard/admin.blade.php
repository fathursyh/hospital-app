<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F-hospital - {{ Auth::user()->name }}</title>
    @include('partials.head')
</head>

<body>
    @session('status')
        <x-flash-message :message="session('status')" />
    @endsession
    @include('components.nav.dashboard-navbar')
        {{ $slot }}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('admin-scripts')
    <script>
        @session('login')
            alert('Welcome back, Doc!');
        @endsession
    </script>
</body>

</html>
