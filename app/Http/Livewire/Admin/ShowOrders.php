<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Report;
use Livewire\Component;

class ShowOrders extends Component
{
    protected $orders;
    public $from = '2021-11-01';
    public $to = '2022-01-01';
    public $num = 0;

    protected $rules = [
        'from' => 'required|date',
        'to' => 'required|date'
    ];

    public function mount()
    {
        $this->setOrders('2021-11-01', '2050-12-01');
    }

    public function SetFromAndTo()
    {

        $this->num = 1;
        $this->setOrders($this->from, $this->to);
    }

    public function savePdf()
    {
        $report = new Report;
        $report->from = $this->from;
        $report->to = $this->to;
        $report->save();

        return redirect(route('admin.pdf.download'));

    }

    public function render()
    {

        return view('livewire.admin.show-orders')->layout('layouts.admin');
    }

    public function setOrders($from, $to)
    {   
        if ($this->num == 0) {
            $this->orders = Order::whereBetween('created_at', [$from, $to])->paginate(10);
            /* $this->orders = Order::paginate(10); */
        } else {
            $this->orders = Order::whereBetween('created_at', [$from, $to])->get();
        }

        return $this;
    }

    public function getOrders()
    {
        return $this->orders;
    }
}
