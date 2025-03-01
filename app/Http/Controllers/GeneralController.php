<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index() {
        
        return view('welcome');
    }
    public function about() {
        return view('about', );
    }
    public function team() {
        return view('team', );
    }
    public function services() {
        return view('services', );
    }
}
