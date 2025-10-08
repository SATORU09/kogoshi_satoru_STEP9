@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="max-w-md mx-auto bg-white rounded shadow p-4 relative">

        <!-- 商品画像 -->
        <div class="relative">
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-64 object-cover rounded">
            @else
                <img src="{{ asset('images/no_image.png') }}" class="w-full h-64 object-cover rounded">
            @endif

            <button id="like-btn" data-product-id="{{ $product->id }}" class="text-xl">
                @if($product->isLikedBy(Auth::user()))
                ❤️
                @else
                🤍
                @endif
            </button>
        </div>

        <!-- 商品情報 -->
        <h2 class="text-2xl font-bold mt-4">{{ $product->name }}</h2>
        <p class="text-red-500 text-xl mt-2">価格：¥{{ number_format($product->price) }}</p>
        <p class="mt-4">商品説明：{{ $product->description }}</p>

        <!-- カート追加と戻る -->
        <div class="mt-4 flex space-x-2 items-center">
            <form method="POST" action="{{ route('cart.store', $product->id) }}" class="flex space-x-2 items-center">
                @csrf
                <input type="number" name="quantity" value="1" class="border border-gray-300 rounded px-2 py-1 w-16 focus:outline-none focus:ring-2 focus:ring-red-400" required>
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">カートに追加</button>
            </form> 
            <button type="button" onclick="window.location.href='{{ route('products.index') }}'" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">戻る</button>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.getElementById('like-btn');
  const productId = btn.dataset.productId;
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  btn.addEventListener('click', async function(e) {
    e.preventDefault();

    try {
      const response = await fetch(`/products/${productId}/like`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': token,
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        },
        credentials: 'same-origin' // セッション Cookie を送る
      });

      console.log('fetch status:', response.status);

      if (response.ok) {
        const data = await response.json();
        btn.textContent = data.liked ? '❤️' : '🤍';
      } else {
        // エラーボディを出す（JSON or text）
        const text = await response.text();
        console.error('Like API error:', response.status, text);
        alert('エラーが発生しました（詳しくはコンソールを確認してください）');
      }
    } catch (err) {
      console.error('Fetch failed:', err);
      alert('通信に失敗しました（ネットワーク等を確認してください）');
    }
  });
});
</script>
@endsection
