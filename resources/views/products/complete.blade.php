@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4" text-center>購入完了</h2>
    <p class="text-center" text-gray-700>ご購入ありがとうございました！</p>

    <div class="mt-4">
        <button type="button" onclick="window.location.href='{{ route('products.index') }}'" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">商品一覧に戻る</button>
    </div>
</div>
@endsection
