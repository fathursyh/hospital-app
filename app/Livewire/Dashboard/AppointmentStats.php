<?php

namespace App\Livewire\Dashboard;

use App\Models\Patient;
use Livewire\Component;

class AppointmentStats extends Component
{
    public $count = 0;
    public function mount() {
        $this->count = 4;
    }
    public function render()
    {
        $latest = Patient::latest()->whereNotBetween('status', ['done', 'taken'])->limit(4)->select('fullname', 'date')->get();
        return view('livewire.dashboard.appointment-stats', compact('latest'));
    }
}
