<x-layouts.app>
    @section('title')
        {{ $user->name }}
    @endsection
    @section('main')
        <div class="mt-18 w-full h-80">
            {{ $user->name }}
        </div>
    @endsection
</x-layouts.app>