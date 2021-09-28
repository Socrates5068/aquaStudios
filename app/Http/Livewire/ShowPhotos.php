<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ShowPhotos extends Component
{
    public $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.show-photos');
    }
}
