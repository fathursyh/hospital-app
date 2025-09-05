<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function schedules() {
        return view('admin.schedules');
    }
    public function staff() {
        return view('admin.staff');
    }
    public function doctors() {
        return view('admin.doctors');
    }
}
