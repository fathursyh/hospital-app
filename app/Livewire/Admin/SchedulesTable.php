<?php

namespace App\Livewire\Admin;

use App\Models\Doctor;
use Livewire\Component;

define('DAYS', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
class SchedulesTable extends Component
{

    public $showModal = false;
    public $editMode = false;

    public $doctorId;
    public $day = DAYS[0];
    public $startTime;
    public $endTime;
    public $available = true;

    public function resetForm()
    {
        $this->clearValidation();
        $this->reset();
    }

    public $doctorSelect;

    public function openModal($edit = false)
    {
        $this->doctorSelect = Doctor::with(['user:id,name'])->get(['id', 'user_id'])->pluck('user.name', 'user_id');
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
        return view('livewire.admin.schedules-table');
    }
}
