<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>F-Hospital - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @include('components.partials.seo-meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('components.navigations.header')
    @yield('main-content')
    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            delay: 0,
            duration: 700,
            easing: 'ease',
            once: true,
            mirror: false,
            anchorPlacement: 'center-bottom',

        });
    </script>
</body>

</html>
