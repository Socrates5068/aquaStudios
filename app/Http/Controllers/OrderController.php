<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Photo;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::query()->where('user_id', auth()->user()->id);
        $orders = $orders->get();
        return view('orders.index', compact('orders'));
    }

    public function payment(Order $order){

        return view('orders.payment', compact('order'));
    }

    public function show (Order $order){
        $this->authorize('author', $order);

        $service = json_decode($order->service);

        return view('orders.show', compact('order', 'service'));
    }
}
