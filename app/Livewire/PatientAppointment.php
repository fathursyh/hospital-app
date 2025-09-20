<?php

namespace App\Livewire;

use App\AlertEnum;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use DateTime;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PatientAppointment extends Component
{
    public $currentStep = 1;
    public $totalSteps = 2;
    // patients data
    public $name = '';
    public $birth = null;
    public $gender = '';
    public $phone = '';
    public $address = '';

    // appointment data
    public $date = null;
    public $doctor = '';
    public $reason = '';
    public $hospitalId;

    public $patientInputs = [
        'patient' => [],
        'appointment' => []
    ];

    public function nextStep()
    {
        $this->validateCurrentStep();

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    private function validateCurrentStep()
    {
        switch ($this->currentStep) {
            case 1:

                $this->patientInputs['patient'] =
                    $this->validate([
                        'name' => 'required',
                        'birth' => 'required',
                        'phone' => 'required',
                        'address' => 'required',
                    ]);
                break;
            case 2:
                $this->patientInputs['appointment'] =
                    $this->validate([
                        'date' => 'required',
                        'doctor' => 'required',
                        'reason' => 'required'
                    ]);
                break;
        }
    }

    public function submitHandle()
    {
        $this->validateCurrentStep();
        $date = new DateTime($this->date);
        $patient = Patient::firstOrCreate([
            'contact' => $this->phone,
            'address' => $this->address,
            'hospital_id' => $this->hospitalId,
            'name' => $this->name,
            'date_of_birth' => $this->birth
        ],
        [
            'hospital_id' => $this->hospitalId,
            'name' => $this->name,
            'date_of_birth' => $this->birth,
            'gender' => 'man',
            'contact' => $this->phone,
            'address' => $this->address,
        ]);
        Appointment::create([
            'hospital_id' => $this->hospitalId,
            'patient_id' => $patient->id,
            'doctor_id' => $this->doctor,
            'appointment_date' => $date->format('Y-m-d'),
            'appointment_time' => $date->format('H:i:s'),
            'reason' => $this->reason,
        ]);

        session()->flash('status', AlertEnum::Success->value);
        session()->flash('message', 'You have successfully booked an appointment!');

        return $this->redirectRoute('home');
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
        if ($this->doctor !== '') {
            if (!in_array($this->doctor, array_column($this->doctorSchedule()->toArray(), 'id'))) {
                $this->doctor = '';
            }
        }
    }

    public function render()
    {
        return view('livewire.patient-appointment');
    }
}
