<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Photo;
use Livewire\Component;

class ShowPhotos extends Component
{
    public $order, $photos, $photo;

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->photos = Photo::where('order_id', $order->id)->get();

    }

    public function updateStatus(Photo $photo)
    {
        if ($photo->status == '1') {
            $photo->status = 2;
            $this->photo = $photo->order_id;
            $photo->save();
        }else{
            $photo->status = 1;
            $this->photo = $photo->order_id;
            $photo->save();
        }
        $this->getPhotos();
    }

    public function getPhotos()
    {
        $this->photos = Photo::where('order_id', $this->photo)->get();
    }

    public function render()
    {
        return view('livewire.show-photos');
    }
}
