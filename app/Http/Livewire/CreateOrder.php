<?php

namespace App\Http\Livewire;

use App\Models\Date;
use App\Models\Order;
use App\Models\Address;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreateOrder extends Component
{
    use WithFileUploads;

    //Image
    public $url, $invitation;
    
    public $service;
    public $schedules;

    //Error for dates reservartions
    public $modal = false;
    public $modal1 = false;
    public $date_error;
    public $date_error1;
    
    //information for delivery
    public $delivery_type = 1;
    public $contact, $phone, $address, $shipping_cost = 10;
    
    //information for address
    public $address_state = 1;
    public $address_1, $address_2;
    public $lat, $lng, $lat1, $lng1;
    
    //information for date and time
    public $dates = [
        'date' => null,
        'time' => null,
        'date1' => null,
        'time1' => null
    ];

    //Other information
    public $comment;

    public $rules = [
        'contact' => 'required|min:4|max:60',
        'phone' => 'required|min:5|max:9999999999|numeric',
        'delivery_type' => 'required',
        'invitation' => 'nullable|image|max:4096',
        'address_1' => 'required|min:4|max:60',
        'lat' => 'required',
        'dates.date' => 'required',
        'dates.time' => 'required',
        'comment' => 'nullable|min:4|max:1800'
    ];

    protected $listeners = [
        'getLatitudeForInput',
        'getLatitudeForInput2'
    ];

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->schedules = new Date();
        $this->schedules = Date::all();
    }

    public function getLatitudeForInput($value, $value2)
    {
        if (!is_null($value && $value2)){
            $this->lat = $value;
            $this->lng = $value2;
        }
    }

    public function getLatitudeForInput2($value, $value2)
    {
        if (!is_null($value && $value2)){
            $this->lat1 = $value;
            $this->lng1 = $value2;
        }
    }

    public function addressType($value)
    {
        if ($value == 1) {
            $this->address_state = 2;
        } else {
            $this->address_state = 1;
        }
    }

    public function updatedAddressState($value)
    {
        if ($value == 1) {
            $this->resetValidation([
                'address'
            ]);
        }
    }

    public function convert_date_php_js($date) {
        $converted_date = date("Y", strtotime($date)).
        ', '.(date("n", strtotime($date))).
        ', '.date("j", strtotime($date));
        return $converted_date;
    }

    public function create_order()
    {
        $rules = $this->rules;
        if ($this->delivery_type == 2) {
            $rules['address'] = 'required|min:4|max:60';
        }

        if ($this->address_state == 2) {
            $rules['address_2'] = 'required|min:4|max:60';
            $rules['lat1'] = 'required';
            $rules['dates.date1'] = 'required';
            $rules['dates.time1'] = 'required';
        }

        $this->validate($rules);

        if (isset($this->invitation)) {
            $this->url = Storage::put('invitations', $this->invitation);
        }

        $con = 0;
        $con2 = 0;
        foreach ($this->schedules as $schedule) {
            if ($schedule->date == $this->dates['date']) {
                $con += 1;
            }
            if ($schedule->date == $this->dates['date1']) {
                $con2 += 1;
            }
        }
        if ($con >= 2) {
            $this->modal = true;
            $this->date_error = "La fecha " . $this->dates['date'] . " ya se encuentra reservada";
            return;
        }
        if ($con2 >= 2) {
            $this->modal1 = true;
            $this->date_error1 = "La fecha " . $this->dates['date1'] . " ya se encuentra reservada";
            return;
        }

        $order = new Order();
        $address = new Address();
        if ($this->delivery_type == 1) {
            $order->user_id = auth()->user()->id;
            $order->service_id = $this->service->id;
            $order->delivery_type = $this->delivery_type;
            $order->shipping_cost = 0;
            $order->total = $this->service->price;
            $order->invitation = $this->url;
            $order->name_contact = $this->contact;
            $order->phone_contact = $this->phone;
            $order->dates = json_encode($this->dates);
            $order->comment = $this->comment;

            $order->save();

            //Adress 
            $address->address = $this->address_1;
            $address->lat = $this->lat;
            $address->lng = $this->lng;
            $address->order_id = $order->id;
            $address->save();

            if ($this->address_state == 2) {
                //Adress 2
                $address2 = new Address();
                $address2->address = $this->address_2;
                $address2->lat = $this->lat1;
                $address2->lng = $this->lng1;
                $address2->order_id = $order->id;
                $address2->save();
            }

        } else {
            $order->user_id = auth()->user()->id;
            $order->service_id = $this->service->id;
            $order->delivery_type = $this->delivery_type;
            $order->shipping_cost = $this->shipping_cost;
            $order->total = $this->service->price + $this->shipping_cost;
            $order->invitation = $this->url;
            $order->name_contact = $this->contact;
            $order->phone_contact = $this->phone;
            $order->d_address = $this->address;
            $order->dates = json_encode($this->dates);
            $order->comment = $this->comment;

            $order->save();

            //Adress 
            $address->address = $this->address_1;
            $address->lat = $this->lat;
            $address->lng = $this->lng;
            $address->order_id = $order->id;
            $address->save();

            if ($this->address_state == 2) {
                //Adress 2
                $address2 = new Address();
                $address2->address = $this->address_2;
                $address2->lat = $this->lat1;
                $address2->lng = $this->lng1;
                $address2->order_id = $order->id;
                $address2->save();
            }
        }

        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
