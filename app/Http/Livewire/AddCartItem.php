<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;


class AddCartItem extends Component
{
    public $service;
    public $qty = 1;
    public $options = [];
    
    public function addItem(){
        $this->options['image'] = Storage::url($this->service->image);
        Cart::add([ 'id' => $this->service->id,
                    'name' => $this->service->name,
                    'qty' => $this->qty, 
                    'price' => $this->service->price, 
                    'weight' => 550,
                    'options' => $this->options,
                ]);
        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
