<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image_path = $path;
        }
        $product->save();
        return redirect()->route('mypage')->with('success', '商品を更新しました');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', '商品を削除しました');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string|max:255',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->user_id = auth()->id();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image_path = $path;
        }else{
            $product->image_path = null;
        }
        $product->save();

        return redirect()->route('products.index')->with('success', '商品を登録しました');
    }

    public function detail($id)
        {
            $product = Product::findOrFail($id);
            return view('products.detail', compact('product'));
        }
    
    public function cart()
    {
        $cart = session()->get('cart', []); 
        
        $previous=url()->previous();
        $fallback=route('products.index');
        $backUrl=$previous !==url()->current() ? $previous : $fallback;

        return view('products.cart',compact('backUrl'));
    }
}
