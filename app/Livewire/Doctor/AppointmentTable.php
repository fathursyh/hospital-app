<?php

namespace App\Livewire\Doctor;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentTable extends Component
{
    public $appointmentData;

    public function mount()
    {
        $this->appointmentData = Appointment::with('patient')->where('hospital_id', auth()->user()->doctorProfile->hospital->id)->get();
    }
    public function render()
    {
        return view('livewire.doctor.appointment-table');
    }
}
