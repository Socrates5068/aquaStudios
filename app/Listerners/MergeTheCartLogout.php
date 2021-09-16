<?php

namespace App\Listerners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;

class MergeTheCartLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //first delete register
        Cart::erase(auth()->user()->id);
        //new register for the cart
        Cart::store(auth()->user()->id);
    }
}
