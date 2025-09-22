<?php

namespace App\Livewire\Admin;

use App\AlertEnum;
use App\Models\Doctor;
use App\Models\User;
use App\SpecializationEnum;
use App\UserEnum;
use Hash;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Component;

class DoctorTable extends Component
{
    #[Url()]
    public $search = '';
    #[Locked()]
    public $userId = '';
    #[Locked()]
    public $userPass = '';
    public $name = '';
    public $specialization = SpecializationEnum::ANESTHESIONLOGIST->value;
    public $email = '';
    public $phone = '';
    public $password = '';
    public $password_confirmation = '';

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => !$this->editMode ? 'required|email|unique:users,email' : '',
            'phone' => 'required|string|regex:/^[0-9]{10,15}$/',
            'password' => !$this->editMode ? 'required|string|min:8|confirmed' : '',
            'password_confirmation' => !$this->editMode ? 'required': ''
        ]);
        try {
            $user = User::updateOrCreate([
                'id' => $this->userId
            ], [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password) ?? $this->userPass,
                'role' => UserEnum::Doctor->value
            ]);

            Doctor::updateOrCreate([
                'user_id' => $this->userId
            ], [
                'user_id' => $user->id,
                'specialization' => $this->specialization,
                'phone' => $this->phone,
                'hospital_id' => auth()->user()->hospital->id
            ]);

            session()->flash('status', AlertEnum::Success->value);
            if ($this->editMode) {
                session()->flash('message', 'Doctor has been updated successfully!');
            } else {
                session()->flash('message', 'Doctor has been created successfully!');
            }
        } catch (\Exception $err) {
            session()->flash('status', AlertEnum::Error->value);
            session()->flash('message', 'Failed updating doctor data!');
        }
        return $this->redirectRoute('admin.doctors');
    }

    public function deleteDoctor($id)
    {
        try {
            User::find($id)->delete();
            session()->flash('status', AlertEnum::Success->value);
            session()->flash('message', 'Doctor has been deleted successfully!');
        } catch (\Exception) {
            session()->flash('status', AlertEnum::Error->value);
            session()->flash('message', 'There is something wrong!');
        }
        return $this->redirectRoute('admin.doctors');
    }

    public $showModal = false;
    public $editMode = false;

    public function resetForm()
    {
        $this->clearValidation();
        $this->reset();
    }

    public function openModal($edit = false, $id = null)
    {
        $this->showModal = true;
        $this->editMode = $edit;
        if ($edit) {
            $doctor = Doctor::with('user')->find($id);
            $this->userId = $doctor->user->id;
            $this->userPass = $doctor->user->password;
            $this->name = $doctor->user->name;
            $this->specialization = $doctor->specialization;
            $this->email = $doctor->user->email;
            $this->phone = $doctor->phone;
        }
        $this->dispatch('open-modal');
    }
    public function closeModal()
    {
        $this->showModal = false;
        $this->editMode = false;
        $this->dispatch('close-modal');

    }

    #[Computed(true)]
    public function doctors() {
        return Doctor::with('user')
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->where('doctors.hospital_id', '=', auth()->user()->hospital->id)
            ->join('users', 'users.id', '=', 'doctors.user_id') // join the users table
            ->orderBy('users.name', 'asc')
            ->select('doctors.*') // avoid column conflicts
            ->paginate(20);
    }
    public function render()
    {
        $specializations = array_map(fn(SpecializationEnum $type) => $type->value, SpecializationEnum::cases());
        return view('livewire.admin.doctor-table', compact('specializations'));
    }
}
