<?php
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:patient'])->group(function () {

});
