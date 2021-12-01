<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Information;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $info;

    public $name, $email, $message;

    public $rules = [
        'name' => 'required|min:4|max:60',
        'email' => 'required|min:5|max:60|email',
        'message' => 'required|min:4|max:2500'
    ];

    public function mount()
    {
        $this->info = Information::first();
    }

    public function send()
    {
        $rules = $this->rules;

        $this->validate($rules);

        $name = $this->name;
        $email = $this->email;
        $message = $this->message;

        Mail::to('admin@aquastudios.store')->send(new ContactMailable($name, $email, $message));

        session()->flash('message','¡Mensaje enviado correctamente!');
        $this->reset('name');
        $this->reset('email');
        $this->reset('message');
        return null;
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
