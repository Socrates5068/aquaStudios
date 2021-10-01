<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

use App\Notifications\NotifyUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentOrder extends Component
{
    use AuthorizesRequests;

    public $order, $user;

    protected $listeners = ['payOrder'];

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->user = $order->user()->first();
    }

    public function payOrder()
    {
        $this->order->status = 2;
        $this->order->save();

        /* Telegram notify */
        $bot = new \TelegramBot\Api\BotApi(env('BOT_API_TOKEN_TELEGRAM'));
        $id= strval($this->order->id);
        $bot->sendMessage("-426827268", 'Se ha registrado una nueva orden, ver la orden en http://aquastudios.test/admin/orders/' . $id . '/edit');

        /* Mail notify */
        $this->toMail = [
            'message' => 'Su pago a sido verificado, puede ver el estado de su orden en el siguente enlace',
            'id' => $this->user->id
        ];
        $this->user->notify(new NotifyUser($this->toMail));

        return redirect()->route('orders.show', $this->order);
    }

    public function render()
    {
        $this->authorize('author', $this->order);
        $this->authorize('payment', $this->order);

        $items = json_decode($this->order->content);
        return view('livewire.payment-order', compact('items'));
    }
}
