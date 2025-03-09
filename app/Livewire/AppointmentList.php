<?php

namespace App\Livewire;

use App\Models\DoctorLog;
use App\Models\Patient;
use Auth;
use Livewire\Component;

class AppointmentList extends Component
{
    public function finishPatient($id) {
        Patient::where('id_patient', '=', $id)->limit(1)->update([
            "status" => "done"
        ]);
    }
    public function render()
    {
        return view('livewire.appointment-list', [
            'list' => DoctorLog::with('patient')->where('id_doctor', '=', Auth::user()->id)->orderBy('taken_at')->paginate(10)
        ]);
    }
}
