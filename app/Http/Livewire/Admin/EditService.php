<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditService extends Component
{
    use WithFileUploads;

    public $service, $categories;
    public $category_id;

    /* For images */
    public $image = null;

    protected $rules = [
        'service.category_id' => 'required',
        'service.name' => 'required|max:60',
        'service.description' => 'required|max:2000',
        'service.price' => 'required|numeric'
    ];

    public function mount(Service $service){
        $this->service = $service;

        $this->categories = Category::all();
        $this->category_id = $service->category_id;
    }

    public function save(){
        $rules = $this->rules;

        if ($this->image) {
            $rules['image'] = 'image|max:4096';

            $this->validate($rules);

            //Storage::delete($this->service->image);

            $url_image = Storage::put('services', $this->image);

            $this->service->image = $url_image;
            $this->service->save();
            $this->reset('image');
            $this->emit('saved');
        } else {
            $this->validate($rules);
    
            $this->service->save();
            $this->emit('saved');
        }


        /* return redirect(route('admin.index')); */
    }

    public function updateState($state){
        $this->service->status = $state;
        $this->service->save();
        /* $this->emit('saved'); */
    }

    public function render()
    {
        return view('livewire.admin.edit-service')->layout('layouts.admin');
    }
}
