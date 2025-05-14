<?php

namespace App\Livewire;

use App\Models\DoctorLog;
use App\Models\Patient;
use Auth;
use Livewire\Component;

class AppointmentList extends Component
{
    public function finishPatient($id) {
        Patient::where('id_patient', '=', $id)->update([
            "status" => "done"
        ]);
        DoctorLog::where('id_patient', '=', $id)->update([
            "status" => "finished"
        ]);
        $this->dispatch('showAlert', message: 'You succesfully treating a patient!', status:'green');
    }
    public function render()
    {
        return view('livewire.appointment-list', [
            'list' => DoctorLog::with('patient')->where('id_doctor', '=', Auth::user()->id)->where('status', '=', 'progress')->orderBy('taken_at')->get()
        ]);
    }
}
