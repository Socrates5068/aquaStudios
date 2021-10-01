<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Photo;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class EditOrder extends Component
{
    public $order, $status;
    public $whatsApp, $message;

    protected $rules = [
        'order.status' => 'required'
    ];
    protected $listeners = ['refreshOrder'];

    public function mount(Order $order){
        $this->order = $order;
        $this->status = $order->status;

        /* WhatsApp notify */
        $apiWhatsApp = "https://api.whatsapp.com/send?phone=";
        $phone = '591' . 61883536;

        switch ($order->status) {
            case '1':
                $this->message = "Su orden aún se encuentra en proceso de verificación, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '2':
                $this->message = "Su pago a sido verificado, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '3':
                $this->message = "Su orden a cambiado al estado EN EDICIÖN, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '4':
                $this->message = "Su orden a cambiado al estado TERMINADO, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '5':
                $this->message = "Su orden a cambiado al estado ENVIADO, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '6':
                $this->message = "Su orden a cambiado al estado ENTREGADO, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '7':
                $this->message = "Su orden a cambiado al estado ANULADO, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            default:
            $this->message = "hola";
                break;
        }

        $this->whatsApp = $apiWhatsApp . $phone . '&text=' . $this->message;
        
        
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $this->order->save();
        $this->emit('saved');
    }

    public function updateState($state){
/*         $rules = $this->rules;
        $this->validate($rules); */

        $this->order->status = $state;
        $this->order->save();

        /* WhatsApp notify */
        $apiWhatsApp = "https://api.whatsapp.com/send?phone=";
        $phone = '591' . 61883536;

        switch ($this->order->status) {
            case '1':
                $this->message = "Su orden aún se encuentra en proceso de verificación, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '2':
                $this->message = "Su pago a sido verificado, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '3':
                $this->message = "Su orden a cambiado al estado EN EDICIÓN, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '4':
                $this->message = "Su orden a cambiado al estado TERMINADO, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '5':
                $this->message = "Su orden a cambiado al estado ENVIADO, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '6':
                $this->message = "Su orden a cambiado al estado ENTREGADO, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            case '7':
                $this->message = "Su orden a cambiado al estado ANULADO, puede ver el estado de su orden en http://aquastudios.test/orders/" . $this->order->id;
                break;
            default:
            $this->message = "hola";
                break;
        }
        $this->whatsApp = $apiWhatsApp . $phone . '&text=' . $this->message;
    }

    public function deletePhoto(Photo $photo){
        Storage::delete([$photo->route_image]);
        $photo->delete();

        $this->order = $this->order->fresh();
    }

    public function refreshOrder(){
        $this->order = $this->order->fresh();
    }

    public function render()
    {
        $items = json_decode($this->order->content);
        return view('livewire.admin.edit-order', compact('items'))->layout('layouts.admin');
    }
}
