@extends('layouts.app-layout')
@section('title', 'Appointment')
@section('main-content')
    <section class="max-w-screen-xl min-h-[70vh] flex justify-center items-center mx-auto py-4">
        <livewire:patient-appointment :hospitalId="$hospitalId"  />
    </section>
@endsection
