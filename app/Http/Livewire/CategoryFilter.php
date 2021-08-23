<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;
    public $category;

    public $view = "grid";

    public function render()
    {
        $services = $this->category->services()
                    ->where('status', 2)->paginate(20);

        return view('livewire.category-filter', compact('services'));
    }
}
