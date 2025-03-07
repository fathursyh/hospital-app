<?php

namespace App\Livewire;

use App\Models\DoctorLog;
use App\Models\Patient;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PatientTable extends Component
{
    use WithPagination;

    public function takePatient($id) {
        Patient::where('id_patient', '=', $id)->update(['status' => 'taken']);
        DoctorLog::create([
            'id_doctor' => Auth::user()->id,
            'id_patient' => $id,
        ]);
        $this->dispatch('showAlert', message: 'You succesfully take a patient!', status:'green');
    }

    public function render()
    {
        return view('livewire.patient-table', [
            'patients' => Patient::orderBy('status')->latest()->paginate(10)
        ]);
    }
}
