<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\App;

class PDF extends Component
{
    public $orders;

    public function mount($from, $to)
    {
        $orders = Order::whereBetween('created_at', [$from, $to])->get();

        $this->orders = $orders;
    }

    public function download()
    {

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function render()
    {
        return view('livewire.admin.p-d-f');
    }
}
