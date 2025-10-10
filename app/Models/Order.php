<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'product_name', 'quantity', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function createOrder($userId, $productId, $quantity, $price = null)
    {
        $order = self::create([
            'user_id'    => $userId,
            'product_id' => $productId,
            'quantity'   => $quantity,
            'price'      => $price,
        ]);

        // 在庫減少処理（CartController用）
        $product = Product::find($productId);
        if ($product) {
            $product->decrement('stock', $quantity);
        }

        return $order;
    }
}
