<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdress extends Model
{
    protected $fillable = [
        "user_id",
        "address_line1",
        "address_line2",
        "city",
        "status",
        "posta_code",
        "country",
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
