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

    public function deleteDate($id)
    {
        /* $jsDateToPHP = strtotime($dateJs);
        $datePHP = date('Y-m-d', $jsDateToPHP);

        foreach ($this->dates as $date) {
            if ($date->date == $datePHP) {
                Date::where('date',$datePHP)->delete();
                break;
            }
        } */

        $date = Date::find($id);
        $date->delete();

        return redirect()->route('admin.schedule');
    }

    public function render()
    {
        return view('livewire.admin.schedule-delete')->layout('layouts.admin');
    }
}
