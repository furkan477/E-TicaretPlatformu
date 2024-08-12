<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "name",
        "cat_ust",
        "status",
    ];

    public function underCategory(){
        return $this->hasMany(Category::class,"cat_ust","id");
    }

    public function products(){
        return $this->hasMany(Product::class,"category_id","id");
    }
}
