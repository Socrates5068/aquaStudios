<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;

class ShowProducts extends Component
{
    public function render()
    {
        $services = Service::paginate(20);

        return view('livewire.admin.show-products', compact('services'))->layout('layouts.admin');
    }
}
