<?php

namespace App\Livewire\Dashboard\Nav;

use App\Models\DoctorLog;
use Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AppointmentLink extends Component
{
    public $count = 0;
    #[On('showAlert')]

    public function mount() {
        $this->count = DoctorLog::where('id_doctor', '=', Auth::user()->id)->where('status', '=' , 'progress')->count();
    }
    public function render()
    {
        return view('livewire.dashboard.nav.appointment-link');
    }
}
