<?php
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/patient-appointment/{hospitalId}', fn($hospitalId) => view('patient-appointment', compact('hospitalId')))->name('patient.appointment');
});
