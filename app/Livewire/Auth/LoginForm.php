<?php

namespace App\Livewire\Auth;

use App\AlertEnum;
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

        $this->validate();

        if (
            Auth::attempt(
                ['email' => $this->email, 'password' => $this->password],
                $this->remember
            )
        ) {
            session()->regenerate();
            session()->flash('status', AlertEnum::Success->value);
            session()->flash('message', 'You have successfuly logged in!');
            $this->redirectRoute('checkout');
        }

        $this->addError('email', 'Invalid credentials.');
        $this->addError('password', 'Invalid credentials.');
    }
    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
