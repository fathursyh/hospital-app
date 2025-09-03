<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        sleep(1);

        $this->validate();

        if (
            Auth::attempt(
                ['email' => $this->email, 'password' => $this->password],
                $this->remember
            )
        ) {
            session()->regenerate();
            session()->flash('status', 'success');
            session()->flash('message', 'You have successfuly logged in!');
            $this->redirectRoute('dashboard');
        }

        $this->addError('email', 'Invalid credentials.');
        $this->addError('password', 'Invalid credentials.');
    }
    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
