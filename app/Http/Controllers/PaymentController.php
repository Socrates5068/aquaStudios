<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Notifications\NotifyUser;

class PaymentController extends Controller
{
    public function payOrder(Request $request)
    {

        $id = $request->transaction_id;

        $order = Order::where('transaction', $id)->first();

        $dates = json_decode($order->dates, true);
        
        $servic = json_decode($order->service, true);
        
        $order->status = 2;
        $order->save();
        
        /* Telegram notify */
        $bot = new \TelegramBot\Api\BotApi(env('BOT_API_TOKEN_TELEGRAM'));
        $id = strval($order->id);
        $bot->sendMessage(-426827268, 'Se ha registrado una nueva reserva, ver la reserva en http://aquastudios.test/admin/orders/' . $id . '/edit');

        /* Mail notify */
        $toMail = [
            'message' => 'Su pago a sido verificado, puede ver el estado de su reserva en el siguente enlace',
            'id' => $order->id
        ];
        $order->user->notify(new NotifyUser($toMail));

        /* Save date on schedule */
        $date = new Date();
        $date->date = $dates['date'];
        $date->time = $dates['time'];
        $date->name = $servic['name'];
        $date->url = 'orders/' . $order->id . '/edit';
        $date->category_id = $servic['category_id'];
        $date->order_id = $order->id;
        $date->save();

        if (isset($dates['date1'])) {
            $date1 = new Date();
            $date1->date = $dates['date1'];
            $date1->time = $dates['time1'];
            $date1->name = $servic['name'];
            $date1->url = 'orders/' . $order->id . '/edit';
            $date1->category_id = $servic['category_id'];
            $date1->order_id = $order->id;
            $date1->save();
        }
    }

    public function payOrderGet()
    {
        return view('pay.get');
    }

    public function payOrderauto()
    {
        return view('pay.auto');
    }
}
