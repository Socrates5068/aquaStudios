<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreateService extends Component
{
    use WithFileUploads;

    public $categories;
    public $image, $tmp;
    public $name, $description, $price;
    public $category_id = "";
    protected $rules = [
        'category_id' => 'required',
        'name' => 'required|max:60',
        'image' => 'required|image|max:4096',
        'description' => 'required|max:2000',
        'price' => 'required|numeric'
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 1MB Max
        ]);

        $this->tmp = $this->image;
    }

    public function save(){
        $rules = $this->rules;

        $this->validate($rules);

        $url_image = Storage::put('services', $this->image);

        $service = new Service();
        
        $service->name = $this->name;
        $service->image = $url_image;
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
