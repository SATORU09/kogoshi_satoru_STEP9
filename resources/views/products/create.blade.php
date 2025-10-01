@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">出品登録フォーム</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- 商品画像 -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">商品画像</label>
                <input type="file" id="image" name="image"
                       class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- 商品名 -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">商品名</label>
                <input type="text" id="name" name="name"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- 説明 -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">商品説明</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-y"></textarea>
            </div>

            <!-- 価格 -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">価格</label>
                <input type="number" id="price" name="price"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- 在庫数 -->
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">在庫数</label>
                <input type="number" id="stock" name="stock"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- ボタン -->
            <div class="flex justify-center gap-4 pt-4">
                <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">
                    出品する
                </button>
                <button type="button"
                        onclick="window.location.href='{{ route('mypage') }}'"
                        class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm">
                    戻る
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

