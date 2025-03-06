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
        $patients = Patient::latest()->get();
        return view('dashboard-patients', compact('patients'));
    }
    public function patientDetail($id) {
        $patient = Patient::find($id);
        dd($patient);
        return view('dashboard-pages.patient-detail');
    }
}
