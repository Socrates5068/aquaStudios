<?php

namespace App\Models;

use App\Models\Date;
use App\Models\User;
use App\Models\Photo;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    const PENDIENTE = 1;
    const CONFIRMADO = 2;
    const EDICION = 3;
    const TERMINADO = 4;
    const ENVIADO = 5;
    const ENTREGADO = 6;
    const ANULADO = 7;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dates(){
        return $this->hasMany(Date::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
