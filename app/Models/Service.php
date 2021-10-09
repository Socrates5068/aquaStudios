<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    const DRAFT = 1;
    const POST = 2;

    protected $fillable = ['name', 'description', 'image', 'categories_id'];

    #One to many reverse
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function order(){
        return $this->hasOne(Order::class);
    }

}
