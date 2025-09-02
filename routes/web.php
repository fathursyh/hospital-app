<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [GeneralController::class, 'landing'])->name('home');
    Route::get('/checkout', [GeneralController::class, 'checkout'])->name('home');
    Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
    Route::get('/sign-up', [AuthController::class, 'register'])->name('register');

    // Route::get('/forgot-password', function () {
    //     return view('auth.forgot-password');
    // })->name('password.request');

    // Route::get('/reset-password/{token}', function ($token) {
    //     return view('auth.reset-password', ['token' => $token]);
    // })->name('password.reset');
});

