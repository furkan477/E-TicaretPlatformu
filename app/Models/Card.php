<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        "user_id",
        "product_id",
        "quantity",
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function products(){
        return $this->belongsTo(Product::class,"product_id","id");
    }
}
