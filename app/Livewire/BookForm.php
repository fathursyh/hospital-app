<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Component;

class BookForm extends Component
{
    public $full_name = '';
    public $email = '';
    public $date;
    public $gender = 'm';
    public $phone;
    public $address;
    public $reason;
    protected $listeners = ['dateSelected' => 'updateDate'];

    public function submit()
    {
        $validated = $this->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|email:dns,rfc,spoof|unique:patients,email',
            'date' => 'required',
            'gender' => 'required|in:m,w',
            'phone' => 'required|min:10|max:13|unique:patients,phone',
            'address' => 'required|string|min:8',
            'reason' => 'required|string',
        ],
        [
            'email.unique' => 'Email already exist.',
            'phone.unique' => 'Phone number already exist.',
            ]
        );
        // dd($validated['date'])
        $validated['fullname'] = $validated['full_name'];
        Patient::create($validated);
        session()->flash('status', 'Appointment booked succesfully!');
        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.booking.book-form');
    }
}
