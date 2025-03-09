<?php

namespace App\Livewire;

use App\Models\DoctorLog;
use Auth;
use Livewire\Component;

class CalendarGrid extends Component
{
    private function getDaysInMonth($year, $month) {
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }
    public function render()
    {
        $appoints = DoctorLog::join('patients', 'doctor_logs.id_patient', '=', 'patients.id_patient')->where('id_doctor', '=', Auth::user()->id)->whereRaw('MONTH(patients.date) = ?', [date('m')])->selectRaw('DAY(date) as date')->get()->pluck('date')->toArray();
        return view('livewire.calendar-grid', [
            'calendar' => $this->getDaysInMonth(date('Y'), date('m')),
            'appoints' => $appoints
        ]);
    }
}
