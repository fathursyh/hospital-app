<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GeneralController::class, 'landing'])->name('home');
Route::get('/checkout', [GeneralController::class, 'checkout'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
    Route::get('/sign-up', [AuthController::class, 'register'])->name('register');
    // Route::get('/forgot-password', function () {
    //     return view('auth.forgot-password');
    // })->name('password.request');
});

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient/dashboard', fn() => view('patient.dashboard'))->name('patient.dashboard');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
