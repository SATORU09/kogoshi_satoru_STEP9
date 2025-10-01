<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request, $product_id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($product_id);
        Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product_id,
            'quantity' => $validated['quantity'],
        ]);
        return redirect()->route('products.index')->with('success', '商品を購入しました');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
