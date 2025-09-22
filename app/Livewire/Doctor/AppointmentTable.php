<?php

namespace App\Livewire\Doctor;

use App\AlertEnum;
use App\Models\Appointment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Request;

class AppointmentTable extends Component
{
    #[Url()]
    public $selectedTab = 'Scheduled';

    #[Url()]
    public $search = '';

    public function changeTab($tab)
    {
        $this->selectedTab = $tab;
    }

    public function changeStatus($id, $status)
    {
        $appointment = Appointment::find($id, ['id', 'status']);
        $appointment->fill([
            'status' => $status
        ]);
        $appointment->save();

        $message = match ($status) {
            'completed' => 'Appointment has been completed!',
            'cancelled' => 'Appointment has been cancelled!',
            'scheduled' => 'Appointment status has been reverted.'
        };

        session()->flash('status', $status === 'completed' ? AlertEnum::Success->value : AlertEnum::Info->value);
        session()->flash('message', $message);
        return $this->redirect('/doctor/dashboard/appointments?' . "search=" . $this->search . "&&selectedTab=" . $this->selectedTab, true);
    }

    #[Computed(persist: true, seconds: 3600)]
    public function appointmentData()
    {
        if ($this->selectedTab === 'Scheduled') {
            return Appointment::with('patient')
                ->where('hospital_id', auth()->user()->doctorProfile->hospital->id)
                ->where('status', 'scheduled')
                ->whereRelation('patient', 'patients.name', 'like', '%' . $this->search . '%')
                ->orderBy('appointment_date', 'asc')
                ->orderBy('appointment_time', 'asc')
                ->get();
        } else if ($this->selectedTab === 'Completed') {
            return Appointment::with('patient')
                ->where('hospital_id', auth()->user()->doctorProfile->hospital->id)
                ->where('status', 'completed')
                ->whereRelation('patient', 'patients.name', 'like', '%' . $this->search . '%')
                ->orderBy('appointment_date', 'asc')
                ->orderBy('appointment_time', 'asc')
                ->get();
        } else {
            return Appointment::with('patient')
                ->where('hospital_id', auth()->user()->doctorProfile->hospital->id)
                ->where('status', 'cancelled')
                ->whereRelation('patient', 'patients.name', 'like', '%' . $this->search . '%')
                ->orderBy('appointment_date', 'asc')
                ->orderBy('appointment_time', 'asc')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.doctor.appointment-table');
    }
}
