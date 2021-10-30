<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $rand, $categories, $category;

    protected $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'icon' => null
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'icon' => null
    ];

    protected $rules =[
        'createForm.name' => 'required|max:30',
        'createForm.icon' => 'required|max:60'
        //'createForm.icon' => 'required|image|max:1024'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.icon' => 'ícono'
    ];

    public function mount()
    {
        /* $this->rand = rand(); */
        $this->getCategories();
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        $this->validate();
        //$icon = $this->createForm['icon']->store('categories');

        Category::create([
            'icon' => $this->createForm['icon'],
            'name' => $this->createForm['name'],
            //'name' => $icon
        ]);
        
        /* $this->rand = rand(); */
        $this->reset('createForm');

        $this->getCategories();
        $this->emit('saved');

    }

    public function edit(Category $category)
    {
        $this->category = $category;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['icon'] = $category->icon;
    }

    public function update()
    {
        $this->validate([
            'editForm.name' => 'required|max:30',
            'editForm.icon' => 'required|max:60'
        ]);

        $this->category->update($this->editForm);
        $this->reset(['editForm']);
        $this->getCategories();
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->getCategories();
    }
    
    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
