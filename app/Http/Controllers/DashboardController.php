<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        return view('dashboard');
    }
    public function appointments() {
        return view('dashboard-appointments');
    }
    public function patients() {
        return view('dashboard-patients');
    }
    public function patientDetail($id) {
        $patient = Patient::find($id);
        return view('dashboard-pages.patient-detail', compact('patient'));
    }
}
