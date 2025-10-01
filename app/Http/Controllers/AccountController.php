<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('account', compact('user'));
    }

    public function update(Request $request)
    
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'name_kanji' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        $user->update([
            'name' => $request->name,
            'name_kanji' => $request->name_kanji,
            'name_kana' => $request->name_kana,
            'email' => $request->email,
        ]);
        Auth::setUser($user->fresh());

        return redirect()->route('mypage')->with('status', 'アカウント情報を更新しました');
    }
}
