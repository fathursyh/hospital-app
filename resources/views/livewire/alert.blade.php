<div id="alertMessage"
    class="p-4 py-6 text-sm font-semibold rounded-lg text-white {{ $status }} fixed w-screen z-50 bottom-0 text-center transition duration-300 @if (!$isShow) opacity-0 @endif pointer-events-none"
    role="alert">
    {{ $message }}
</div>

@script
<script>
Livewire.on('showAlert', () => {
    setTimeout(() => {
        Livewire.dispatch('hideAlert');
    }, 4000);
})
</script>
@endscript
