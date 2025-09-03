@props(['status', 'message'])
@php
    function getNotifColor($status)
    {
        return match ($status) {
            'info' => 'flex items-center justify-center p-4 mb-4 text-sm text-blue-800 bg-blue-50',
            'success' => 'flex items-center justify-center p-4 mb-4 text-sm text-green-800 bg-green-50',
            'error' => 'flex items-center justify-center p-4 mb-4 text-sm text-red-800 bg-red-50',
            'warning' => 'flex items-center justify-center p-4 mb-4 text-sm text-yellow-800 bg-yellow-50',
        };
    }
    $class = getNotifColor($status);
@endphp
<div id="app-alert" class="{{ $class }} fixed left-0 top-0 z-50 w-full cursor-pointer" role="alert">
    <svg class="me-3 inline h-4 w-4 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium capitalize">{{ $status }} alert!</span> {{ $message }}
    </div>
</div>

<script>
    const alert = document.getElementById("app-alert");
    alert.addEventListener("click", () => {
        alert.style.display = "none";
    });
</script>
