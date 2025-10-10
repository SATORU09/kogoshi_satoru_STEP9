<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request, $product_id)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($product_id);
        Order::createOrder(auth()->id(), $product_id, $validated['quantity'], $product->price);
        return redirect()->route('products.index')->with('success', '商品を購入しました');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
