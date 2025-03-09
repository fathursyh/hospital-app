<?php

namespace App\Livewire\Dashboard;

use App\Models\DoctorLog;
use Livewire\Component;

class AppointmentStats extends Component
{
    public $count = 0;
    public function mount() {
        $this->count = DoctorLog::count();
    }
    public function render()
    {
        $latest = DoctorLog::join('patients', 'doctor_logs.id_patient', '=', 'patients.id_patient')->orderByRaw('patients.date ASC')->limit(4)->get();
        return view('livewire.dashboard.appointment-stats', compact('latest'));
    }
}
