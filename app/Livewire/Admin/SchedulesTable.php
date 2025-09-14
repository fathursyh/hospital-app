<?php

namespace App\Livewire\Admin;

use App\Models\Doctor;
use App\Models\Schedule;
use App\SpecializationEnum;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Ramsey\Collection\Set;

define('DAYS', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
class SchedulesTable extends Component
{
    #[Url()]
    public $filter = [];
    public $showModal = false;
    public $editMode = false;

    public $doctor;
    public $day = DAYS[0];
    public $startTime;
    public $endTime;

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

    public function updateSchedule()
    {
        $this->validate([
            'doctor' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);
        $user = auth()->user();

        $existSchedule = Schedule::firstOrCreate(
            [
                'doctor_id' => $this->doctor,
                'hospital_id' => $user->hospital->id,
                'day_of_week' => $this->day
            ],
            [
                'doctor_id' => $this->doctor,
                'hospital_id' => $user->hospital->id,
                'day_of_week' => $this->day,
                'start_time' => $this->startTime,
                'end_time' => $this->endTime,
            ]
        );

        $existSchedule->update([
            'start_time' => $this->startTime,
            'end_time' => $this->endTime
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'New schedule has been created!');
        $this->redirectRoute('admin.schedules');
    }

    public function render()
    {
        $doctorSchedules = Doctor::with(['user:id,name', 'schedules'])->get(['id', 'user_id', 'specialization', 'hospital_id'])
        ->where('hospital_id', '=', auth()->user()->hospital->id)
        ->toArray();
           $specializations = array_map(fn(SpecializationEnum $type) => $type->value, SpecializationEnum::cases());
        return view('livewire.admin.schedules-table', compact(['doctorSchedules', 'specializations']));
    }
}
