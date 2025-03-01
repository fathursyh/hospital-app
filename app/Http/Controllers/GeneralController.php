<?php

namespace App\Http\Controllers;

use App\Models\Avatars;
use App\Models\User;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index() {

        return view('welcome');
    }
    public function about() {
        return view('about');
    }
    public function team() {
        // $data = Avatars::get();
        $data = User::with('avatar')->get();
        print($data[0]);
        // dd($data);
        // return view('team', compact('data'));
    }
    public function services() {
        return view('services', );
    }
}
