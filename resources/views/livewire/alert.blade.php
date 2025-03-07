<div id="alertMessage"
    class="p-4 py-6 text-sm font-semibold text-{{ $status === 'green' ? 'green' : 'blue' }}-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-{{ $status === 'green' ? 'green' : 'blue' }}-400 fixed w-screen z-50 bottom-0 text-center transition duration-300 @if (!$isShow) opacity-0 @endif pointer-events-none"
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
