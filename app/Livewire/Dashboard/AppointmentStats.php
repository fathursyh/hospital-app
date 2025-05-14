<?php

namespace App\Livewire\Dashboard;

use App\Models\DoctorLog;
use Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AppointmentStats extends Component
{
    public $count = 0;
    #[On('showAlert')]
    public function mount() {
        $this->count = DoctorLog::where('id_doctor', '=', Auth::user()->id)->where('status', '=', 'progress')->count();
    }
    public function render()
    {
        $latest = DoctorLog::join('patients', 'doctor_logs.id_patient', '=', 'patients.id_patient')->where('doctor_logs.status', '=', 'progress')->orderByRaw('patients.date ASC')->limit(4)->get();
        return view('livewire.dashboard.appointment-stats', compact('latest'));
    }
}
