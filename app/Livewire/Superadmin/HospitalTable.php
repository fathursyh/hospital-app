<?php

namespace App\Livewire\Superadmin;

use App\Models\Hospital;
use Livewire\Attributes\Url;
use Livewire\Component;

class HospitalTable extends Component
{
    #[Url()]
    public $search = '';

    public function render()
    {
        $hospitals = Hospital::with('admin')->where('name', 'like', "%".$this->search."%")->orderBy('name', 'asc')->paginate(20);
        return view('livewire.superadmin.hospital-table', [
            'hospitals' => $hospitals
        ]);
    }
}
