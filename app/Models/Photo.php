<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['route_image', 'status', 'order_id'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
