<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "user_id",
        "product_id",
        "comment",
        "rating",
        "status",
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function products(){
        return $this->belongsTo(Product::class,"product_id","id");
    }
}
