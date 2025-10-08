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
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function likes()
{
    return $this->hasMany(\App\Models\Like::class);
}

public function isLikedBy($user)
{
    if (!$user) return false;
    return $this->likes()->where('user_id', $user->id)->exists();
}

}
