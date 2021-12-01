<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowProducts extends Component
{
    public $categories;

    protected $listeners = ['delete'];

    public function mount()
    {
        //$this->categorie = Category::all()->count();
        $this->categories = Category::all();
    }

    public function delete(Service $service)
    {
        Storage::delete($service->image);
        
        $service->delete();
        $this->render();
    }

    public function getServices()
    {
        $services = Service::orderBy('id','DESC')->paginate(20);
    }

    public function render()
    {
        $services = Service::orderBy('id','DESC')->paginate(20);

        return view('livewire.admin.show-products', compact('services'))->layout('layouts.admin');
    }
}
