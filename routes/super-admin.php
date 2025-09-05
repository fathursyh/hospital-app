<?php
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/dashboard/hospitals', [SuperAdminController::class, 'hospitals'])->name('superadmin.hospitals');
    Route::get('/superadmin/dashboard/plans', [SuperAdminController::class, 'plans'])->name('superadmin.plans');
    Route::get('/superadmin/dashboard/plans/edit/{id}', [SuperAdminController::class, 'edit'])->name('superadmin.plans.edit');
    Route::put('/superadmin/dashboard/plans/update/{plan}', [SuperAdminController::class, 'update'])->name('superadmin.update');
    Route::get('/superadmin/dashboard/finances', [SuperAdminController::class, 'finances'])->name('superadmin.finances');
});
