<?php

namespace App\Http\Livewire;

use App\Models\Date;
use App\Models\Order;
use App\Models\Service;
use Livewire\Component;
use App\Notifications\NotifyUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentOrder extends Component
{
    use AuthorizesRequests;

    public $order, $user, $dates, $servic;

    protected $listeners = ['payOrder'];

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->dates = json_decode($order->dates, true);
        $this->user = $order->user()->first();

        /* Service */
        $this->servic = json_decode($order->service, true);
    }

    public function payOrder()
    {
        $this->order->status = 2;
        $this->order->save();

        /* Telegram notify */
        $bot = new \TelegramBot\Api\BotApi(env('BOT_API_TOKEN_TELEGRAM'));
        $id= strval($this->order->id);
        $bot->sendMessage(-426827268, 'Se ha registrado una nueva reserva, ver la reserva en http://aquastudios.test/admin/orders/' . $id . '/edit');

        /* Mail notify */
        $this->toMail = [
            'message' => 'Su pago a sido verificado, puede ver el estado de su reserva en el siguente enlace',
            'id' => $this->order->id
        ];
        $this->user->notify(new NotifyUser($this->toMail));

        /* Save date on schedule */
        $date = new Date();
        $date->date = $this->dates['date'];
        $date->time = $this->dates['time'];
        $date->name = $this->servic['name'];
        $date->url = 'orders/' . $this->order->id . '/edit';
        $date->category_id = $this->servic['category_id'];
        $date->order_id = $this->order->id;
        $date->save();
        
        if (isset($this->dates['date1'])) {
            $date1 = new Date();
            $date1->date = $this->dates['date1'];
            $date1->time = $this->dates['time1'];
            $date1->name = $this->servic['name'];
            $date1->url = 'orders/' . $this->order->id . '/edit';
            $date1->category_id = $this->servic['category_id'];
            $date1->order_id = $this->order->id;
            $date1->save();
        }


        return redirect()->route('orders.show', $this->order);
    }

    public function render()
    {
        $this->authorize('author', $this->order);
        $this->authorize('payment', $this->order);

        $service = json_decode($this->order->service);
        return view('livewire.payment-order', compact('service'));
    }
}
