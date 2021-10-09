<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'time', 'order_id', 'category_id'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    public function service()
    {
        return $this->hasOneThrough(Service::class, Order::class, 'id', 'id', 'order_id', 'service_id');
    }
}
