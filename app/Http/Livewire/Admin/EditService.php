<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Service;
use Livewire\Component;

class EditService extends Component
{
    public $service, $categories;
    public $category_id;

    protected $rules = [
        'service.category_id' => 'required',
        'service.name' => 'required',
        'service.description' => 'required',
        'service.price' => 'required'
    ];

    public function mount(Service $service){
        $this->service = $service;

        $this->categories = Category::all();
        $this->category_id = $service->category_id;
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $this->service->save();
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.edit-service')->layout('layouts.admin');
    }
}
