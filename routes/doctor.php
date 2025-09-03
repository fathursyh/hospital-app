<?php
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/doctor/dashboard/appointments', [DoctorController::class, 'appointments'])->name('doctor.appointments');
    Route::get('/doctor/dashboard/bills', [DoctorController::class, 'bills'])->name('doctor.bills');
});
