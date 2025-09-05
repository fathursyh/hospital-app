<?php

namespace App\Livewire\Auth;

use App\AlertEnum;
use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email:rfc,dns|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required'
    ];

    public function register()
    {

        $this->validate();

        // Create the user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Log them in automatically
        Auth::login($user);

        session()->regenerate();

        return redirect()->intended('/dashboard')->with([
            'status' => AlertEnum::Success->value,
            'message' => 'Your account is registered successfully!'
        ]);
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
