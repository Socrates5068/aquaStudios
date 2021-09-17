<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];

    const PENDIENTE = 1;
    const CONFIRMADO = 2;
    const EDICION = 3;
    const TERMINADO = 4;
    const ENVIADO = 5;
    const ENTREGADO = 6;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
