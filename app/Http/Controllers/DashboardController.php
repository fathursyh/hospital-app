<?php

namespace App\Http\Controllers;

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
}
