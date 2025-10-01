<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // フォーム表示
    public function show()
    {
        return view('contact');
    }

    // フォーム送信処理
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        return back()->with('success', 'お問い合わせ内容を送信しました。');
    }
}
