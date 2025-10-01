<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;   
use App\Models\Order;


class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image_path', 'user_id', 'stock'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
