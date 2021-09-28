<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Photo;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class EditOrder extends Component
{
    public $order, $status;

    protected $rules = [
        'order.status' => 'required'
    ];
    protected $listeners = ['refreshOrder'];

    public function mount(Order $order){
        $this->order = $order;
        $this->status = $order->status;

        /* $this->categories = Category::all();
        $this->category_id = $order->category_id; */
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
        $this->emit('saved');
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
