<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Product;

class LikeController extends Controller
{
    public function toggle(Product $product)
    {
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)
                    ->where('product_id', $product->id)
                    ->first();

        if ($like) {
            $like->delete();
            return response()->json(['liked' => false]);
        } else {
            Like::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);
            return response()->json(['liked' => true]);
        }
    }
}

