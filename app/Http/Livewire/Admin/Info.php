<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Information;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Info extends Component
{
    use WithFileUploads;

    public $info;
    public $image, $address, $telephone, $schedule;
    public $twitter, $facebook, $instagram, $whatsapp;

    public function mount()
    {
        $this->info = Information::first();

        //$this->image = $this->info->image;
        $this->address = $this->info->address;
        $this->telephone = $this->info->telephone;
        $this->schedule = $this->info->schedule;
        $this->twitter = $this->info->twitter;
        $this->facebook = $this->info->facebook;
        $this->instagram = $this->info->instagram;
        $this->whatsapp = $this->info->whatsapp;
    }

    protected $rules = [
        'address' => 'required|max:150',
        'telephone' => 'required|max:30',
        'schedule' => 'required|max:100',
        'twitter' => 'required|max:100',
        'facebook' => 'required|max:100',
        'instagram' => 'required|max:100',
        'whatsapp' => 'required|max:100'
    ];

    public function update()
    {
        $rules = $this->rules;

        if ($this->image) {
            $rules['image'] = 'image|max:4096';

            $this->validate($rules);

            Storage::delete($this->info->image);

            $url_image = Storage::put('images', $this->image);

            $this->info->image = $url_image;
            $this->info->address = $this->address;
            $this->info->telephone = $this->telephone;
            $this->info->schedule = $this->schedule;
            $this->info->twitter = $this->twitter;
            $this->info->facebook = $this->facebook;
            $this->info->instagram = $this->instagram;
            $this->info->whatsapp = $this->whatsapp;
            $this->info->save();

            $this->reset('image');
            $this->emit('saved');
        } else {
            $this->validate($rules);
            $this->info->address = $this->address;
            $this->info->telephone = $this->telephone;
            $this->info->schedule = $this->schedule;
            $this->info->twitter = $this->twitter;
            $this->info->facebook = $this->facebook;
            $this->info->instagram = $this->instagram;
            $this->info->whatsapp = $this->whatsapp;
            $this->info->save();

            $this->emit('saved');
        }
    }

    public function render()
    {
        return view('livewire.admin.info')->layout('layouts.admin');
    }
}
