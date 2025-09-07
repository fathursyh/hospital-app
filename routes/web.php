<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GeneralController::class, 'landing'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
    Route::get('/sign-up', [AuthController::class, 'register'])->name('register');
    // Route::get('/forgot-password', function () {return view('auth.forgot-password');})->name('password.');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [GeneralController::class, 'checkout'])->name('checkout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//* superadmin routes
require __DIR__ . '/super-admin.php';

//* admin routes
require __DIR__ . '/admin.php';

//* doctor routes
require __DIR__ . '/doctor.php';

//* patient routes
require __DIR__ . '/patient.php';
