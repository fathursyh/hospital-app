<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'F-Hospital')</title>
        @if (request()->path()==='booking')
            <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
        @endif
        @include('partials.head')
    </head>
    <body class="min-h-[80vh] font-roboto overflow-x-hidden">
        @include('components.nav.web-navbar')
        <main>
            @yield('main')
        </main>
        @include('components.composables.web-footer')

    </body>
</html>
