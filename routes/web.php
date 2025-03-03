<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [GeneralController::class, 'index'])->name('home');
Route::get('/about', [GeneralController::class, 'about'])->name('about');
Route::get('/team', [GeneralController::class, 'team'])->name('team');
Route::get('/services', [GeneralController::class, 'services'])->name('services');
Route::get('/doctor/{id}', [GeneralController::class, 'detail'])->name('detail');
Route::get('/booking', [GeneralController::class, 'booking'])->name('booking');


Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index');
    Route::get('dashboard/appointments', [DashboardController::class, 'appointments'])->name('dashboard-appointments');
    Route::get('dashboard/patients', [DashboardController::class, 'patients'])->name('dashboard-patients');

});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


require __DIR__.'/auth.php';
