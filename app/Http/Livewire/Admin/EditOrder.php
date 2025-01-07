<?php

namespace App\Http\Livewire\Admin;

use App\Models\Date;
use App\Models\Order;
use App\Models\Photo;
use Livewire\Component;
use App\Notifications\NotifyUser;
use Illuminate\Support\Facades\Storage;

class EditOrder extends Component
{

    public $order, $status, $dates, $servic;
    public $whatsApp, $message;

    /* Map */
    public $coordinates = [];
    public $addresses = 0;

    public $user;
    public $toMail = [
        'message' => 'default',
        'id' => 'id',
    ];

    protected $rules = [
        'order.status' => 'required'
    ];
    protected $listeners = ['refreshOrder'];

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->dates = json_decode($order->dates, true);

        /* Service */
        $this->servic = json_decode($order->service, true);

        $this->status = $order->status;
        /* $this->user = User::where('id', $order->user_id)->first(); */
        $this->user = $order->user()->first();

        /* WhatsApp notify */
        $apiWhatsApp = "https://api.whatsapp.com/send?phone=";
        $phone = '591' . $this->user->celphone;

        switch ($order->status) {
            case '1':
                $this->message = "Su reserva aún se encuentra en proceso de verificación, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '2':
                $this->message = "Su pago a sido verificado, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '3':
                $this->message = "Su reserva a cambiado al estado EN EDICIÖN, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '4':
                $this->message = "Su reserva a cambiado al estado TERMINADO, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '5':
                $this->message = "Su reserva a cambiado al estado ENVIADO, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '6':
                $this->message = "Su reserva a cambiado al estado ENTREGADO, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '7':
                $this->message = "Su reserva a cambiado al estado ANULADO, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                break;
            default:
                $this->message = "hola";
                break;
        }

        $this->whatsApp = $apiWhatsApp . $phone . '&text=' . $this->message;

        foreach ($order->addresses as $address) {
            array_push($this->coordinates, $address->lat);
            array_push($this->coordinates, $address->lng);
        }

        if (isset($this->coordinates[2])) {
            $this->addresses = 1;
        }
    }

    public function save()
    {
        $rules = $this->rules;
        $this->validate($rules);

        $this->order->save();
        $this->emit('saved');
    }

    public function updateState($state)
    {
        /*         $rules = $this->rules;
        $this->validate($rules); */

        $this->order->status = $state;
        $this->order->save();

        $this->render();

        /* WhatsApp notify */
        $apiWhatsApp = "https://api.whatsapp.com/send?phone=";
        $phone = '591' . $this->user->celphone;

        switch ($this->order->status) {
            case '1':
                $this->message = "Su reserva aún se encuentra en proceso de verificación, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                $this->toMail = [
                    'message' => 'Su reserva aún se encuentra en proceso de verificación, puede ver el estado de su reserva en el siguente enlace',
                    'id' => $this->order->id
                ];
                $this->user->notify(new NotifyUser($this->toMail));
                break;
            case '2':
                $this->message = "Su pago a sido verificado, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                $this->toMail = [
                    'message' => 'Su pago a sido verificado, puede ver el estado de su reserva en el siguente enlace',
                    'id' => $this->order->id
                ];
                $this->user->notify(new NotifyUser($this->toMail));
                $this->pay();
                break;
            case '3':
                $this->message = "Su reserva a cambiado al estado EN EDICIÓN, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                $this->toMail = [
                    'message' => 'Su reserva a cambiado al estado EN EDICIÓN, puede ver el estado de su reserva en el siguente enlace',
                    'id' => $this->order->id
                ];
                $this->user->notify(new NotifyUser($this->toMail));
                break;
            case '4':
                $this->message = "Su reserva a cambiado al estado TERMINADO, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                $this->toMail = [
                    'message' => 'Su reserva a cambiado al estado TERMINADO, puede ver el estado de su reserva en el siguente enlace',
                    'id' => $this->order->id
                ];
                $this->user->notify(new NotifyUser($this->toMail));
                break;
            case '5':
                $this->message = "Su reserva a cambiado al estado ENVIADO, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                $this->toMail = [
                    'message' => 'Su reserva a cambiado al estado ENVIADO, puede ver el estado de su reserva en el siguente enlace',
                    'id' => $this->order->id
                ];
                $this->user->notify(new NotifyUser($this->toMail));
                break;
            case '6':
                $this->message = "Su reserva a cambiado al estado ENTREGADO, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                $this->toMail = [
                    'message' => 'Su reserva a cambiado al estado ENTREGADO, puede ver el estado de su reserva en el siguente enlace',
                    'id' => $this->order->id
                ];
                $this->user->notify(new NotifyUser($this->toMail));
                break;
            case '7':
                $this->message = "Su reserva a cambiado al estado ANULADO, puede ver el estado de su reserva en http://aquastudios.test/orders/" . $this->order->id;
                $this->toMail = [
                    'message' => 'Su reserva a cambiado al estado ANULADO, puede ver el estado de su reserva en el siguente enlace',
                    'id' => $this->order->id
                ];
                $this->user->notify(new NotifyUser($this->toMail));
                $this->delete();
                break;
            default:
                $this->message = "hola";
                break;
        }
        $this->whatsApp = $apiWhatsApp . $phone . '&text=' . $this->message;
    }

    public function deletePhoto(Photo $photo)
    {
        Storage::delete([$photo->route_image]);
        $photo->delete();

        $this->order = $this->order->fresh();
    }

    public function refreshOrder()
    {
        $this->order = $this->order->fresh();
    }

    public function delete()
    {
        Date::where('order_id', $this->order->id)->delete();
    }

    public function pay()
    {
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
    }

    public function render()
    {
        /* $items = json_decode($this->order->content);
        return view('livewire.admin.edit-order', compact('items'))->layout('layouts.admin'); */
        $service = json_decode($this->order->service);
        return view('livewire.admin.edit-order', compact('service'))->layout('layouts.admin');
    }
}
