<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image_url',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');;
    }

    public function comments(){
        return $this->hasMany(Comment::class,'product_id','id');
    }

    public function carts(){
        return $this->hasMany(Card::class,'product_id','id');
    }
    
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
}
