@extends('layouts.dashboard-layout')
@section('title', 'Plans')
@section('content')
    <div>
        <header
            class="mb-4 grid h-16 max-w-screen-xl place-items-center rounded-lg bg-gray-700 shadow-[inset_4px_4px_8px_-6px_white]">
            <h1 class="lg:text-2xl text-xl font-bold text-gray-50">Manage Our Plans</h1>
        </header>
        <div class="grid h-full max-w-screen-xl gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($plans as $plan)
                <x-superadmin.plan-card :id="$plan->id" :name="$plan->name" :price="$plan->price" :features="$plan->features" />
            @endforeach
        </div>
    </div>
@endsection
