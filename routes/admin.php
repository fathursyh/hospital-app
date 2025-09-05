<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:admin', 'hospital'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/schedules', [AdminController::class, 'schedules'])->name('admin.schedules');
    Route::get('/admin/dashboard/staff', [AdminController::class, 'staff'])->name('admin.staff');
    Route::get('/admin/dashboard/doctors', [AdminController::class, 'doctors'])->name('admin.doctors');
});
