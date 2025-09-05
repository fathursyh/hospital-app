<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function landing() {
        $plans = Plan::all();
        return view('landing', compact('plans'));
    }
    public function checkout() {
        return view('checkout');
    }
}
