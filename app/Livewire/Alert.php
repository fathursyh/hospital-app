<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Alert extends Component
{
    public $message;
    public $status = 'red';
    public $isShow = false;

    #[On('showAlert')]
    public function showAlert($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
        $this->isShow = true;
    }

    #[On('hideAlert')]
    public function hideAlert(){
        $this->reset(['isShow', 'message', 'status']);
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
