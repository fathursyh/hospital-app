<?php

namespace App\Livewire\Dashboard;

use App\Models\Patient;
use Livewire\Component;

class PatientStats extends Component
{
    public $patients = 0;
    public function mount() {
        $this->patients = Patient::count();
    }
    public function render()
    {
        return view('livewire.dashboard.patient-stats', [
            'patients' => $this->patients
        ]);
    }
}
