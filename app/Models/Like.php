<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public static function toggleLike($userId, $productId)
    {
        $like = self::where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->first();

        if ($like) {
            $like->delete();
            return false;
        } else {
            self::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            return true;
        }
    }
}
