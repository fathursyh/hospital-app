@extends('layouts.dashboard-layout')
@section('title', 'Hospitals')
@section('content')
<div class="min-h-screen">
    <livewire:superadmin.hospital-table />
</div>
@endsection
