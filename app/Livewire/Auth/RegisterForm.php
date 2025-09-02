<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email:rfc,dns|unique:users,email',
        'password' => 'required|min:8',
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

        return redirect()->intended('/');
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
