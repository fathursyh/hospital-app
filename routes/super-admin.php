<?php
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/dashboard/hospitals', [SuperAdminController::class, 'hospitals'])->name('superadmin.hospitals');
    Route::get('/superadmin/dashboard/plans', [SuperAdminController::class, 'plans'])->name('superadmin.plans');
});
