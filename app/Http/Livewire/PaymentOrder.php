<?php

namespace App\Http\Livewire;

use App\Models\Date;
use App\Models\Order;
use App\Models\Service;
use Livewire\Component;
use App\Http\Gateways\Libelula;
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
        $id = strval($this->order->id);
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

    public function libelula()
    {
        if ($this->order->url_transaction) {
            return redirect($this->order->url_transaction);
        } else {
            $fecha_expiracion = new \DateTime();
            $fecha_expiracion->add(new \DateInterval('P1D'));

            $appkey = 'aa5bc37a-14a3-5934-b2e9-bec7777cd4d8';
            $data = array(
                //'callback_url'			=> route('libelula_callback'),
                'callback_url'            => route('pay.auto'),
                'url_retorno'            => 'http://aquastudios.store/orders/' . $this->order->id,
                'email_cliente'         => 'noreply@aquastudios.store',
                'identificador_deuda'     => str_pad($this->order->id, 4, '0', STR_PAD_LEFT),
                'fecha_vencimiento'        => $fecha_expiracion->format('Y-m-d'),
                'descripcion'            => 'Pago Compra Online',
                'nombre_cliente'         => $this->order->user->name,
                'tipo_factura'             => '0', //Servicios
                'emite_factura'            => 0,
                'moneda'                => 'BOB',
                'lineas_detalle_deuda'    => [
                    [
                        'cantidad'             => 1,
                        'concepto'             => 'Pago de servicios',
                        'costo_unitario'     => (float)$this->order->total, // * (int)$this->quantitySeats,
                    ]
                ]
            );
            try {
                $libelula = new Libelula($appkey);
                $libelula->setData($data);
                $res = $libelula->crearDeuda();

                $this->order->transaction = $res['id_transaccion'];
                
                $this->order->url_transaction = $res['url_pasarela_pagos'];
                $this->order->save();

                return redirect($res['url_pasarela_pagos']);
            } catch (\Exception $e) {
                session()->flash('error', $e->getMessage());
                return null;
            }
        }
    }

    public function render()
    {
        $this->authorize('author', $this->order);
        $this->authorize('payment', $this->order);

        $service = json_decode($this->order->service);
        return view('livewire.payment-order', compact('service'));
    }
}
