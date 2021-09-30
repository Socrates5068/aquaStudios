<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function photos (Order $order){
        
        ///$photos = Photo::where('order_id', $order->id)->get();
        //$photos = $order->photos;
        return view('photos.download', compact('order'));
    }
}
