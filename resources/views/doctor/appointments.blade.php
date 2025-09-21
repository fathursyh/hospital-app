@extends('layouts.dashboard-layout')
@section('title', 'Appointments')
@section('content')
    <h1 class="text-2xl text-gray-50 font-bold mb-2">
        My Appointments
    </h1>
    <livewire:doctor.appointment-table />
@endsection
