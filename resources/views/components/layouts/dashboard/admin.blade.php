<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Auth::user()->name }}</title>
    @include('partials.head')
</head>

<body>
    @session('status')
        <x-flash-message :message="session('status')" />
    @endsession
    @include('components.nav.dashboard-navbar')
    {{ $slot }}
    <script>
        @session('login')
            alert('Welcome back, Doc!');
        @endsession
    </script>
</body>

</html>