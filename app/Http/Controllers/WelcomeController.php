<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()) {
            $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
            if ($pendiente) {

                $mensaje = "Usted tiene $pendiente reservas pendientes. <a class='font-bold' href='" . route('orders.index') ."'> Ir a pagar </a>";
                session()->flash('flash.banner', $mensaje);
            }
        }

        $categories = Category::all();
        return view('welcome', compact('categories'));
    }
}
