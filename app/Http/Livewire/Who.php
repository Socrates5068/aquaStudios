<?php

namespace App\Http\Livewire;

use App\Models\Information;
use Livewire\Component;

class Who extends Component
{
    public $info;

    public function mount()
    {
        $this->info = Information::first();
    }

    public function render()
    {
        return view('livewire.who');
    }
}
