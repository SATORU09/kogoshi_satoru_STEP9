<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('account', compact('user'));
    }

    public function update(UpdateAccountRequest $request)
    
    {
        $user = Auth::user();
        $user->update($request->validated());
        Auth::setUser($user->fresh());

        return redirect()->route('mypage')->with('status', 'アカウント情報を更新しました');
    }
}
