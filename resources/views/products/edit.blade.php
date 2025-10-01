@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 space-y-6">

    <!-- タイトル -->
    <h2 class="text-2xl font-bold text-gray-800 text-center">出品商品編集</h2>

    <!-- 編集フォーム -->
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
          class="bg-white shadow rounded px-6 py-6 space-y-4">
        @csrf
        @method('PUT')

        <!-- 商品名 -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">商品名</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <!-- 価格 -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">価格</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <!-- 商品説明 -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">商品説明</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                      required>{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- 在庫数 -->
        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">在庫数</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? 0) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- 商品画像 -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">商品画像</label>
            <input type="file" name="image" id="image"
                   class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <!-- ボタン -->
        <div class="flex justify-between pt-4">
            <button type="button"
                    onclick="window.location.href='{{ route('products.detail', $product->id) }}'"
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

