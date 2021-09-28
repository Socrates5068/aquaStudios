<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'time', 'uuid'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
