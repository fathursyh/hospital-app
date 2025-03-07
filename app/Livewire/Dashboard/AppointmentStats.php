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
        $latest = DoctorLog::with('patient')->orderBy('taken_at', 'desc')->limit(4)->get();
        return view('livewire.dashboard.appointment-stats', compact('latest'));
    }
}
