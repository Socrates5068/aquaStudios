<?php

namespace App\Http\Livewire\Admin;

use App\Models\Date;
use Livewire\Component;

class Schedule extends Component
{
    public $dates;

    public function mount()
    {
        $this->dates = Date::all();

    }
    
    public function render()
    {
        return view('livewire.admin.schedule')->layout('layouts.admin');
    }
}
