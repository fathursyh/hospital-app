<?php
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/patient-appointment/{hospitalId}', fn() => view('patient-appointment'))->name('patient.appointment');
});
