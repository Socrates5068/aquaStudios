<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;
    public $services = [];

    public function loadPosts(){
        $this->services = $this->category->services()->where('status', 2)->take(15)->get();
        $this->emit('glider', $this->category->id);
    }

    public function render()
    {
        return view('livewire.category-products');
    }
}
