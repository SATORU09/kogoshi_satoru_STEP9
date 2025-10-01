@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 space-y-8">

    <!-- 商品詳細タイトル -->
    <h2 class="text-3xl font-bold text-gray-800">出品商品詳細</h2>

    <!-- 商品情報 -->
    <div class="space-y-4 text-lg text-gray-700">
        <p><strong>商品名：</strong>{{ $product->name }}</p>
        <p><strong>説明：</strong>{{ $product->description }}</p>
    </div>

    <!-- 商品画像と操作パネル -->
    <div class="flex flex-col md:flex-row items-start space-y-4 md:space-y-0 md:space-x-4">
        <!-- 画像 -->
        <div class="md:flex-1">
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="商品画像"
                 class="w-full h-auto">
        </div>
        <!-- 編集/削除/戻るボタン -->
        <div class="flex flex-col md:items-start md:flex-initial">
            <div class="text-lg font-semibold text-gray-800 mb-4">
                金額：¥{{ number_format($product->price) }}
            </div>
            <a href="{{ route('products.edit', $product->id) }}"
               class="bg-blue-500 text-white text-sm px-6 py-2 mb-2 rounded hover:bg-blue-600">
                編集
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('この商品を削除してもよろしいですか？');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 text-white text-sm px-6 py-2 mb-2 rounded hover:bg-red-600">
                    削除する
                </button>
            </form>
            <a href="{{ route('mypage') }}"
               class="bg-gray-500 text-white text-sm px-6 py-2 rounded hover:bg-gray-600">
                戻る
            </a>
        </div>
    </div>

</div>
@endsection

