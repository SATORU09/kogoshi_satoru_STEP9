<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $quantity = (int)$request->input('quantity', 1);

        if (isset($cart[$product->id])) {

            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "name"       => $product->name,
                "price"      => $product->price,
                "quantity"   => $quantity,
                "stock"      => $product->stock,
                "image_path" => $product->image_path, 
            ];
        }

        session()->put('cart', $cart);

        session()->put('backUrl', route('products.show', $product->id));

        return redirect()->route('cart.index')->with('success', '商品をカートに追加しました');
    }

    // カート画面表示
    public function index()
    {
        $cart = session()->get('cart', []);
        $backUrl = session()->get('backUrl', route('products.index'));
        return view('products.cart', compact('cart', 'backUrl'));
    }

    // 購入処理
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'カートに商品がありません');
        }

        foreach ($cart as $id => $item) {
            $product = Product::find($id);

            if (!$product || $product->stock < $item['quantity']) {
                return redirect()->route('cart.index')->with(
                    'error',
                    "{$item['name']}の在庫が不足しています"
                );
            }

            Order::createOrder(auth()->id(), $id, $item['quantity'], $item['price']);
        }

        session()->forget('cart');

        return redirect()->route('cart.complete');
    }

    public function complete()
    {
        return view('products.complete');
    }
}


