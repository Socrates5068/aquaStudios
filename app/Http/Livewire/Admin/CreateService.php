<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Service;
use Livewire\Component;

class CreateService extends Component
{
    public $categories;
    public $name, $description, $price;    
    public $category_id = "";
    protected $rules = [
        'category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'price' => 'required'
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $service = new Service();
        
        $service->name = $this->name;
        $service->image = "image";
        $service->description = $this->description;
        $service->price = $this->price;
        $service->category_id = $this->category_id;

        $service->save();

        return redirect()->route('admin.services.edit', $service);
    }

    public function render()
    {
        return view('livewire.admin.create-service')->layout('layouts.admin');
    }
}
