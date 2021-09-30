<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Photo;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::query()->where('user_id', auth()->user()->id);
        $orders = $orders->get();
        return view('orders.index', compact('orders'));
    }

    public function payment(Order $order){

        $items = json_decode($order->content);

        return view('orders.payment', compact('order', 'items'));
    }

    public function show (Order $order){
        $this->authorize('author', $order);

        $items = json_decode($order->content);

        return view('orders.show', compact('order', 'items'));
    }
}
