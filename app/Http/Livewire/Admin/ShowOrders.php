<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class ShowOrders extends Component
{
    public function render()
    {
        $orders = Order::paginate(10);

        return view('livewire.admin.show-orders', compact('orders'))->layout('layouts.admin');
    }
}
