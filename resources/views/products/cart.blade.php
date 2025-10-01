@extends('layouts.app')

@section('content')
<div class="container">
    <div class="max-w-md mx-auto bg-white rounded shadow p-4 relative">

        <h2 class="text-2xl font-bold mb-4">ショッピングカート</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(!empty($cart) && count($cart) > 0)
            <form method="POST" action="{{ route('cart.checkout') }}">
                @csrf

                @foreach($cart as $id => $product)
                    <div class="mb-6">
                        <!-- 商品画像 -->
                        <div class="relative">
                            @if(!empty($product['image_path']))
                                <img src="{{ asset('storage/' . $product['image_path']) }}" 
                                     class="w-full h-64 object-cover rounded">
                            @else
                                <img src="{{ asset('images/no_image.png') }}" 
                                     class="w-full h-64 object-cover rounded">
                            @endif
                        </div>

                        <!-- 商品情報 -->
                        <h3 class="text-xl font-bold mt-4">{{ $product['name'] }}</h3>
                        <p class="text-red-500 text-lg mt-2">価格：¥{{ number_format($product['price']) }}</p>

                        <div class="mt-3 flex items-center space-x-2">
                            @if($product['stock'] > 0)
                                <input type="number" 
                                       name="quantities[{{ $id }}]" 
                                       value="{{ $product['quantity'] }}" 
                                       min="1" 
                                       max="{{ $product['stock'] }}" 
                                       class="border border-gray-300 rounded px-2 py-1 w-20 focus:outline-none focus:ring-2 focus:ring-red-400">
                                <span class="text-sm text-gray-500">在庫: {{ $product['stock'] }}</span>
                            @else
                                <span class="text-red-500">在庫切れ</span>
                            @endif
                        </div>

                        <p class="mt-2 text-gray-700">小計：¥{{ number_format($product['price'] * $product['quantity']) }}</p>
                    </div>
                @endforeach

                <!-- 購入 & 戻るボタン -->
                <div class="mt-6 flex space-x-2 justify-between">
                    @php
                        $hasStock = collect($cart)->contains(fn($product) => $product['stock'] > 0);
                    @endphp

                    <button type="submit" 
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 disabled:opacity-50" 
                            {{ $hasStock ? '' : 'disabled' }}>
                        購入する
                    </button>

                    <button type="button" 
                            onclick="window.location.href='{{ $backUrl }}'" 
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        戻る
                    </button>
                </div>
            </form>
        @else
            <p class="text-gray-600">カートに商品はありません。</p>
        @endif
    </div>
</div>
@endsection


