<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditReservation extends Component
{
    use WithFileUploads;

    public $order;

    #Event information
    public $address, $name_contact, $phone_contact;

    #Invitation
    public $invitation, $url;

    #Address information
    public $address1, $edit_address1;
    public $address2, $edit_address2;

    #Map Information
    public $edit_lat1, $edit_lng1;
    public $edit_lat2, $edit_lng2;

    #Comment information
    public $comment;

    public $rules = [
        'name_contact' => 'required|min:4|max:60',
        'phone_contact' => 'required|min:5|max:9999999999|numeric',
        'invitation' => 'nullable|image|max:4096',
        'edit_address1' => 'required|min:4|max:60',
        'comment' => 'nullable|min:4|max:1800'
    ];

    protected $listeners = [
        'getLatitudeFromInput',
        'getLatitudeFromInput2'
    ];

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->address = $order->d_address;

        $this->name_contact = $order->name_contact;
        $this->phone_contact = $order->phone_contact;

        $addresses = $order->addresses;
        $add = [];

        foreach ($addresses as $address) {
            array_push($add, $address);
        }

        $this->address1 = $add[0];
        $this->edit_address1 = $this->address1->address;
        $this->edit_lat1 = $this->address1->lat;
        $this->edit_lng1 = $this->address1->lng;
        if (isset($add[1])) {
            $this->address2 = $add[1];
            $this->edit_address2 = $this->address2->address;
            $this->edit_lat2 = $this->address2->lat;
            $this->edit_lng2 = $this->address2->lng;
        }

        $this->comment = $order->comment;
    }

    public function getLatitudeFromInput($value, $value2)
    {
        if (!is_null($value && $value2)) {
            $this->edit_lat1 = $value;
            $this->edit_lng1 = $value2;
        }
    }

    public function getLatitudeFromInput2($value, $value2)
    {
        if (!is_null($value && $value2)) {
            $this->edit_lat2 = $value;
            $this->edit_lng2 = $value2;
        }
    }

    public function update_order()
    {
        $rules = $this->rules;

        if ($this->edit_address2) {
            $rules['edit_address2'] = 'required|min:4|max:60';
        }

        $this->validate($rules);

        if (isset($this->invitation)) {
            Storage::delete($this->order->invitation);
            $this->url = Storage::put('invitations', $this->invitation);
        }

        if (isset($this->order->d_address)) {
            $this->order->d_address = $this->address;
        }

        $this->order->name_contact = $this->name_contact;
        $this->order->phone_contact = $this->phone_contact;

        if ($this->url) {
            $this->order->invitation = $this->url;
        }

        $this->order->comment = $this->comment;

        $this->order->save();

        $this->address1->address = $this->edit_address1;
        $this->address1->lat = $this->edit_lat1;
        $this->address1->lng = $this->edit_lng1;
        $this->address1->save();

        if ($this->address2) {
            $this->address2->address = $this->edit_address2;
            $this->address2->lat = $this->edit_lat2;
            $this->address2->lng = $this->edit_lng2;
            $this->address2->save();
        }

        return redirect()->route('orders.show', $this->order);
    }

    public function render()
    {
        return view('livewire.edit-reservation');
    }
}
