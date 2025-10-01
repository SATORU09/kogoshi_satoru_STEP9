<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;


class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::where('user_id', $user->id)->orderBy('id', 'asc')->get();
        $purchasedProducts = Order::where('user_id', $user->id)->with('product')->orderBy('created_at', 'desc')->get();
        return view('mypage', compact('user', 'purchasedProducts', 'products'));
    }
}
