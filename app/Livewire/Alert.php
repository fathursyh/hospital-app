<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Alert extends Component
{
    public $message;
    public $status = '';
    public $isShow = false;

    #[On('showAlert')]
    public function showAlert($status, $message)
    {
        $this->status = $status === 'green' ? 'bg-green-700' : 'bg-red-700';
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
