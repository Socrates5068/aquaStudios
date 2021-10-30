<?php

namespace App\Http\Livewire\Admin;

use App\Models\Date;
use Livewire\Component;

class ScheduleDelete extends Component
{
    public $dates;

    protected $listeners = ['deleteDate'];

    public function mount()
    {
        $this->dates = Date::all();
    }

    public function deleteDate($dateJs)
    {
        $jsDateToPHP = strtotime($dateJs);
        $datePHP = date('Y-m-d', $jsDateToPHP);

        foreach ($this->dates as $date) {
            if ($date->date == $datePHP) {
                Date::where('date',$datePHP)->delete();
                break;
            }
        }

        return redirect()->route('admin.schedule');
    }

    public function render()
    {
        return view('livewire.admin.schedule-delete')->layout('layouts.admin');
    }
}
