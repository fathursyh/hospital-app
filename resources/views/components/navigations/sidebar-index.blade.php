@php
    function activeLink($pattern, $pattern2 = null)
    {
        return request()->is([$pattern, $pattern2]) ? 'bg-gray-700' : null;
    }
@endphp
@switch(auth()->user()->role)
    @case('superadmin')
        @include('components.navigations.sidebar-superadmin');
    @break
    @case('admin')
        @include('components.navigations.sidebar-admin');
    @break
    @default
        @include('components.navigations.sidebar-doctor');
@endswitch
