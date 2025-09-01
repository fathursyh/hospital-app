@extends('layouts.auth-layout')
@section('title')Login @endsection
@section('main-content')
    <div class="flex min-h-screen flex-col justify-center bg-gray-50 py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md fade-up">
            <a href="/">
                <div class="flex justify-center">
                    <i class="fas fa-hospital text-4xl text-blue-600"></i>
                </div>
            </a>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Sign in to F-Hospital
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="" class="font-medium text-blue-600 hover:text-blue-500">
                    Register here
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md fade-up">
            <div class="bg-white px-4 py-8 shadow sm:rounded-lg sm:px-10">
                @livewire('auth.login-form')
            </div>
        </div>
    </div>
@endsection
