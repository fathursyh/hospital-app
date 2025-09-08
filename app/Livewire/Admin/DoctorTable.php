<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Url;
use Livewire\Component;

class DoctorTable extends Component
{
    #[Url()]
    public $search = '';
    public $name = '';
    public $specialization = '';
    public $email = '';
    public $phone = '';
    public $password = '';
    public $password_confirmation = '';

    public function save()
    {
        // dd($this->name);
        $this->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|regex:/^[0-9]{10,15}$/|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

    }

    public $showModal = false;
    public $editMode = false;

    public function openModal($edit = false)
    {
        $this->showModal = true;
        $this->editMode = $edit;
        $this->dispatch('open-modal');
    }
    public function closeModal()
    {
        $this->showModal = false;
        $this->editMode = false;
        $this->dispatch('close-modal');
    }
    public function render()
    {
        return view('livewire.admin.doctor-table');
    }
}
