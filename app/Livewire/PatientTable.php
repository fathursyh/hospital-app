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
        DoctorLog::create([Auth::user()->id, $id, null, 'taken']);

    }
    public function render()
    {
        return view('livewire.patient-table', [
            'patients' => Patient::latest()->orderBy('status')->paginate(10)
        ]);
    }
}
