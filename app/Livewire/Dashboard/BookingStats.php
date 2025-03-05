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
        $months = [];
        for($i = 0; $i < 4; $i++){
            $prevs = (new DateTime())->modify("-$i months");
            array_push($this->date, $prevs->format('M'));
            array_push($months, $prevs->format('Y-m-d'));
        }
        $months = array_reverse($months);
        array_push($months, (new DateTime())->modify('+1 months')->format('Y-m-d'));
        for($i = 0; $i < 4; $i++){
            $month = Patient::whereBetween(DB::raw('DATE(date)'), [$months[$i], $months[$i+1]])->count();
            array_push($this->data, $month);
        }
        unset($months);
        unset($month);
        $this->date = array_reverse($this->date);

        return view('livewire.dashboard.booking-stats', [
            'date' => $this->date,
            'data' => $this->data
        ]);
    }
}
