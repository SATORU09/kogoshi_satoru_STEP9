@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 space-y-6">

    <!-- タイトル -->
    <h2 class="text-2xl font-bold text-gray-800 text-center">アカウント編集</h2>

    <!-- 編集フォーム -->
    <form method="POST" action="{{ route('account.update') }}" class="bg-white shadow rounded px-6 py-6 space-y-4">
        @csrf
        @method('PUT')

        <!-- ユーザー名 -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">ユーザー名</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <!-- 名前 -->
        <div>
            <label for="name_kanji" class="block text-sm font-medium text-gray-700 mb-1">名前</label>
            <input type="text" name="name_kanji" id="name_kanji" value="{{ old('name_kanji', $user->name_kanji) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label for="name_kana" class="block text-sm font-medium text-gray-700 mb-1">名前(カナ)</label>
            <input type="text" name="name_kana" id="name_kana" value="{{ old('name_kana', $user->name_kana) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <!-- メールアドレス -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <!-- ボタン -->
        <div class="flex justify-between pt-4">
            <button type="button"
                    onclick="window.location.href='{{ route('mypage') }}'"
                    class="bg-gray-600 text-white text-sm px-4 py-2 rounded hover:bg-gray-700">
                戻る
            </button>
            <button type="submit"
                    class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600">
                更新
            </button>
        </div>
    </form>

</div>
@endsection

