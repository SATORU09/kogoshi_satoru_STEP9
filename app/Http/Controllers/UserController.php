<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $myProducts = $user->products;
        $myOrders = $user->orders;

        return view('users.mypage', compact('user', 'myProducts', 'myOrders'));
    }

    public function edit()
    {
        return view('mypage.edit');
    }
}
