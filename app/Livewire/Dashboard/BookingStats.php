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
    public function mount() {
        $months = [];
        for($i = 0; $i < 4; $i++){
            $prevs = (new DateTime())->modify("-$i months");
            array_push($this->date, $prevs->format('M y'));
            array_push($months, $prevs->format('m'));
        }
        $months = array_reverse($months);
        array_push($months, (new DateTime())->modify('+1 months')->format('m'));
        for($i = 0; $i < 4; $i++){
            $month = Patient::whereBetween(DB::raw('MONTH(date)'), [$months[$i], $months[$i+1]])->where('status', '=', 'done')->count();
            array_push($this->data, $month);
        }
        unset($months);
        unset($month);
        $this->date = array_reverse($this->date);
    }
    public function render()
    {
        return view('livewire.dashboard.booking-stats');
    }
}
