<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'F-Hospital')</title>
    @include('partials.head')
</head>

<body class="min-h-[80vh] font-roboto overflow-x-hidden relative">
    @session('status')
        <x-flash-message :message="session('status')" />
    @endsession
    @include('components.nav.web-navbar')
    <main>
        @yield('main')

    </main>
    @include('components.composables.web-footer')

</body>

</html>
