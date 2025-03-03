<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Component;

class BookForm extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $date;
    public $gender = 'm';
    public $phone;
    public $address;
    public $reason;
    protected $listeners = ['dateSelected' => 'updateDate'];

    public function updateDate($date)
    {
        $this->date = $date;
    }
    public function submit()
    {
        $this->first_name = trim($this->first_name);
        $this->last_name = trim($this->last_name);
        $validated = $this->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|email:dns,rfc,spoof|unique:patients,email',
            'date' => 'required',
            'gender' => 'required|in:m,w',
            'phone' => 'required|min:10|max:13',
            'address' => 'required|string|min:8',
            'reason' => 'required|string',
        ]);
        $validated['fullname'] = $validated['first_name'] .' '. $validated['last_name'];
        Patient::create($validated);
        session()->flash('status', 'Appointment booked succesfully!');
        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.booking.book-form');
    }
}
