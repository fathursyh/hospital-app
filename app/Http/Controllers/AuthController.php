<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have logged out successfuly.')->with('status', 'success');
    }

    public function dashboard()
    {
        session()->keep(['status', 'message']);
        $user = auth()->user();
        switch ($user->role) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'hospital':
                return redirect()->route('hospital.dashboard');
            case 'doctor':
                return redirect()->route('doctor.dashboard');
            case 'patient':
                return redirect()->route('patient.dashboard');
            default:
                return redirect()->route('home');
        }
    }
}
