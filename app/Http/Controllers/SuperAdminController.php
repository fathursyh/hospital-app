<?php

namespace App\Http\Controllers;

use App\Models\Plan;
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
        $plans = Plan::all(['name', 'price', 'features']);
        return view('superadmin.plans', compact('plans'));
    }
}
