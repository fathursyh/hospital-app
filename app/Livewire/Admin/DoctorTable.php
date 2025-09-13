<?php

namespace App\Livewire\Admin;

use App\Models\Doctor;
use App\Models\User;
use App\UserEnum;
use Hash;
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
            'phone' => 'required|string|regex:/^[0-9]{10,15}$/',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => UserEnum::Doctor->value
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'specialization' => $this->specialization,
            'phone' => $this->phone,
            'hospital_id' => auth()->user()->hospital->id
        ]);
        session()->flash('status', 'success');
        session()->flash('message', 'Doctor has been created successfully!');
        return $this->redirectRoute('admin.doctors');

    }

    public $showModal = false;
    public $editMode = false;

    public function resetForm()
    {
        $this->clearValidation();
        $this->reset();
    }

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
        $doctors = Doctor::with('user')
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->join('users', 'users.id', '=', 'doctors.user_id') // join the users table
            ->orderBy('users.name', 'asc')
            ->select('doctors.*') // avoid column conflicts
            ->paginate(20);

        return view('livewire.admin.doctor-table', compact('doctors'));
    }
}
