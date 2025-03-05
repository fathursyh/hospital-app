<?php

namespace App\Livewire\Dashboard;

use App\Models\Patient;
use DateTime;
use DB;
use Livewire\Component;

class BookingStats extends Component
{
    public $date = [];
    public $data = [];
    public function render()
    {
        for($i = 0; $i < 5; $i++){
            array_push($this->date, (new DateTime())->modify("+$i months")->format('Y-m-d'));
        }
        Patient::whereBetween(DB::raw('DATE(date)'), [$this->date[0], $this->date[1]])->count();

        return view('livewire.dashboard.booking-stats', ['date' => $this->date]);
    }
}
