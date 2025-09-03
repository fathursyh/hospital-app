<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function dashboard()
    {
        return view('doctor.dashboard');
    }
    public function appointments()
    {
        return view('doctor.appointments');
    }
    public function bills()
    {
        return view('doctor.bills');
    }
}
