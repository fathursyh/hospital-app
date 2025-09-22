<?php

namespace App\Livewire\Doctor;

use App\Models\Appointment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

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

    #[Computed(persist: true, seconds: 3600)]
    public function appointmentData()
    {
        if ($this->selectedTab === 'Scheduled') {
            return Appointment::with('patient')
                ->where('hospital_id', auth()->user()->doctorProfile->hospital->id)
                ->where('status', 'scheduled')
                ->whereRelation('patient', 'patients.name', 'like', '%'. $this->search .'%')
                ->get();
        } else if ($this->selectedTab === 'Completed') {
            return Appointment::with('patient')
                ->where('hospital_id', auth()->user()->doctorProfile->hospital->id)
                ->where('status', 'completed')
                ->whereRelation('patient', 'patients.name', 'like', '%'. $this->search .'%')
                ->get();
        } else {
            return Appointment::with('patient')
                ->where('hospital_id', auth()->user()->doctorProfile->hospital->id)
                ->where('status', 'cancelled')
                ->whereRelation('patient', 'patients.name', 'like', '%'. $this->search .'%')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.doctor.appointment-table');
    }
}
