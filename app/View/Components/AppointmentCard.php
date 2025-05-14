<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppointmentCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $patient,
    )
    {
        //
    }
    
    public function render(): View|Closure|string
    {
        return view('components.appointment-card');
    }
}
