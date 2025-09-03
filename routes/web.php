<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GeneralController::class, 'landing'])->name('home');
Route::get('/checkout', [GeneralController::class, 'checkout'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
    Route::get('/sign-up', [AuthController::class, 'register'])->name('register');
    // Route::get('/forgot-password', function () {return view('auth.forgot-password');})->name('password.');
});



Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//* admin routes
require __DIR__ . '/admin.php';

//* admin routes
require __DIR__ . '/doctor.php';

//* patient routes
require __DIR__ . '/patient.php';
