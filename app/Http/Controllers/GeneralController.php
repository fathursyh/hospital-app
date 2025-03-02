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
        $data = User::with('avatar')->orderBy('birthyear')->get();
        return view('team', compact('data'));
    }
    public function services() {
        return view('services', );
    }
    public function detail(String $id) {
        $user = User::with('avatar')->findOrFail($id);
        return view('detail', compact('user'));
    }
}
