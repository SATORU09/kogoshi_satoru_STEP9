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

        $liked = Like::toggleLike($user->id, $product->id);
        return response()->json(['liked' => $liked]);
    }
}

