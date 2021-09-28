<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Storage;

class OrderController extends Controller
{

    public function images(Order $order, Request $request){

        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $url = Storage::put('images_order', $request->file('image'));

        $order->photos()->create([
            'route_image' => $url,
        ]);
    }
}
