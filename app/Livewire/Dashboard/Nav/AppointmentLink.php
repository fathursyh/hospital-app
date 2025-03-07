<?php

namespace App\Livewire\Dashboard\Nav;

use App\Models\Patient;
use Livewire\Component;

class AppointmentLink extends Component
{
    public $count = 0;

    public function mount() {
        // $this->count = Patient::count();
    }
    public function render()
    {
        return view('livewire.dashboard.nav.appointment-link', ['count' => $this->count]);
    }
}
