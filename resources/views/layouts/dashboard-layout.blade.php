<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - @yield('title')</title>
    @include('components.partials.seo-meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <x-navigations.sidebar-index />
    <main class="p-6 md:ms-64 md:p-8">
        @yield('content')
    </main>
    @session('status')
        <x-ui.app-alert :status="session('status')" :message="session('message')" />
    @endsession
    <script>
        function show() {
            document.querySelector('dialog').showModal();
        }

        function hide() {
            document.querySelector('dialog').close();
        }
        document.addEventListener('livewire:navigated', () => {
            initFlowbite()
            document.addEventListener('open-modal', show);
            document.addEventListener('close-modal', hide);
        });

        document.addEventListener('livewire:navigating', () => {
            document.removeEventListener('open-modal', show);
            document.removeEventListener('close-modal', hide);
        })
    </script>
</body>

</html>
