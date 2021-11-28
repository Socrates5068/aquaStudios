<?php

namespace App\Http\Livewire;

use App\Models\Date;
use Livewire\Component;

class Schedule extends Component
{
    public $dates, $date;

    protected $listeners = ['saveDate'];

    public function mount()
    {
        $this->dates = Date::all();
    }

    public function saveDate($date)
    {
        $this->date =  json_decode($date, true);
        
        /* Convert date JS to PHP */
        $jsDateToPHP = strtotime($this->date['event_date']);
        $datePHP = date('Y-m-d', $jsDateToPHP);

        /* Save de convert date to the database */
        $date = new Date;
        $date->date = $datePHP;
        $date->time = '17:45:00';
        $date->name = $this->date['event_title'];
        $date->url = $this->date['event_url'];
        switch ($this->date['event_theme']) {
            case 'yellow':
                $date->category_id = 1;
                break;
            case 'green':
                $date->category_id = 2;
                break;
            case 'red':
                $date->category_id = 3;
                break;
            case 'purple':
                $date->category_id = 4;
                break;
            default:
                $date->category_id = 5;
                break;
        }

        $date->save();

        /* Save the id */
        $date->url = $this->date['event_url'].'&id='.$date->id;
        $date->save();

        return redirect()->route('admin.schedule');
    }
    
    public function render()
    {
        return view('livewire.schedule');
    }
}
