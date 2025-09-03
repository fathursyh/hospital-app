@switch(auth()->user()->role)
    @case('admin')
        @include('components.navigations.sidebar-admin');
    @break
    @default
        @include('components.navigations.sidebar-doctor');
@endswitch
