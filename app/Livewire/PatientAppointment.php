<?php

namespace App\Livewire;

use App\Models\Doctor;
use DateTime;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PatientAppointment extends Component
{
    public $name = '';
    public $date = null;
    public $doctorId = '';
    public $reason = '';
    public $hospitalId;

    public function submitHandle()
    {
        $this->validate([
            'name' => 'required',
            'date' => 'required',
            'doctorId' => 'required',
            'reason' => 'required'
        ]);
        sleep(2);
        return true;
    }

    #[Computed()]
    public function doctorSchedule()
    {
        if ($this->date) {
            $date = new DateTime($this->date);
            return Doctor::with(['user:id,name', 'schedules'])
                ->where('hospital_id', $this->hospitalId)
                ->whereRelation('schedules', 'day_of_week', '=', $date->format('l'))
                ->whereRelation('schedules', 'start_time', '<=', $date->format('H:i:s'))
                ->whereRelation('schedules', 'end_time', '>=', $date->format('H:i:s'))
                ->get();
        }
        return [];
    }

    public function updated()
    {
        if ($this->doctorId !== '') {
            if (!in_array($this->doctorId, array_column($this->doctorSchedule()->toArray(), 'id'))) {
                $this->doctorId = '';
            }
        }
    }

    public function render()
    {
        return view('livewire.patient-appointment');
    }
}
