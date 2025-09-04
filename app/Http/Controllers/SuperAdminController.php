<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('superadmin.dashboard');
    }
    public function hospitals()
    {
        return view('superadmin.hospitals');
    }
    public function plans()
    {
        return view('superadmin.plans');
    }
}
