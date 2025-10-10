<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;

class ContactController extends Controller
{
    // フォーム表示
    public function show()
    {
        return view('contact');
    }

    // フォーム送信処理
    public function send(SendContactRequest $request)
    {
        $validated = $request->validated();

        return back()->with('success', 'お問い合わせ内容を送信しました。');
    }
}
