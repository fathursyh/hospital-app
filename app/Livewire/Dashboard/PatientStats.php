<?php

namespace App\Livewire\Dashboard;

use App\Models\Patient;
use Livewire\Component;
use Livewire\Attributes\Computed;

class PatientStats extends Component
{
    public $patients = 0;
    #[Computed]
    public function status()
    {
        if($this->patients > 10) {return 'bg-red-400';}
        else if($this->patients > 5 and $this->patients <= 10) {return 'bg-amber-400';}
        else {return 'bg-green-400';}
    }
    public function boot() {
        $this->patients = Patient::whereYear('date', '=', date('Y'))->whereNotBetween('status', ['done', 'taken'])->count();
    }
    public function render()
    {
        $latest = Patient::latest()->whereNotBetween('status', ['done', 'taken'])->limit(4)->select('fullname', 'date')->get();
        return view('livewire.dashboard.patient-stats', [
            'latest' => $latest
        ]);
    }
}
