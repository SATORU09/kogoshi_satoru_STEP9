@extends('layouts.app')

@section('content')
<div class="container">
    <div class="max-w-md mx-auto bg-white rounded shadow p-4 relative">

        <!-- 商品画像 -->
        <div class="relative">
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-64 object-cover rounded">
            @else
                <img src="{{ asset('images/no_image.png') }}" class="w-full h-64 object-cover rounded">
            @endif

           <!-- お気に入りボタン -->
           <button
           id="favoriteButton"
           type="button"
           aria-pressed="false"
           aria-label="お気に入り"
           class="absolute top-2 right-2 text-gray-400 text-3xl transition-colors focus:outline-none"
           >

           <svg id="favoriteIcon" class="w-10 h-10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6.02 4.02 4 6.5 4c1.74 0 3.41 1 4.5 2.09C12.09 5 13.76 4 15.5 4 17.98 4 20 6.02 20 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
           </svg>
           </button>

           <span class="hidden text-red-500"></span>
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
document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('favoriteButton');
  if (!btn) return;

  btn.addEventListener('click', function () {
    const isFav = btn.getAttribute('aria-pressed') === 'true';
    if (isFav) {
      btn.classList.remove('text-red-500');
      btn.classList.add('text-gray-400');
      btn.setAttribute('aria-pressed', 'false');
    } else {
      btn.classList.remove('text-gray-400');
      btn.classList.add('text-red-500');
      btn.setAttribute('aria-pressed', 'true');
    }
  });
});
</script>
@endsection
