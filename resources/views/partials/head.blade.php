<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" type="image/x-icon" href="{{ URL::to('/') }}/icon.png">

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
<script>
    if(localStorage.getItem('color-theme') === null) {
        localStorage.setItem('color-theme', 'light');
    }
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
