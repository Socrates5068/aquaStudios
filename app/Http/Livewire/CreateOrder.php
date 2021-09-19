<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CreateOrder extends Component
{
    public $envio_type = 1;
    
    //information for delivery
    public $contact, $phone, $address, $shipping_cost = 10;

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required'
    ];

    public function updatedEnvioType($value){
        if ($value == 1) {
            $this->resetValidation([
                'address'
            ]);
        }
    }

    public function create_order(){
        $rules = $this->rules;
        if($this->envio_type == 2){
            $rules['address'] = 'required';
        }

        $this->validate($rules);

        $order = new Order();

        if ($this->envio_type == 1) {
            $order->user_id = auth()->user()->id;
            $order->envio_type = $this->envio_type;
            $order->shipping_cost = 0;
            $order->total = Cart::subtotal();
            $order->content = Cart::content();
            $order->name_contact = $this->contact;
            $order->phone_contact = $this->phone;
    
            $order->save();
        } else{
            $order->user_id = auth()->user()->id;
            $order->envio_type = $this->envio_type;
            $order->shipping_cost = $this->shipping_cost;
            $order->total = $this->shipping_cost+Cart::subtotal();
            $order->content = Cart::content();
            $order->name_contact = $this->contact;
            $order->phone_contact = $this->phone;
            $order->d_address = $this->address;
    
            $order->save();
        }

        Cart::destroy();

        return redirect()->route('orders.payment', $order);

    }    
        
    public function render()
    {
        return view('livewire.create-order');
    }
}
