@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-8 space-y-8">

    <!-- マイページタイトル -->
    <h2 class="text-2xl font-bold text-gray-800">マイページ</h2>

    <!-- ユーザー情報 -->
    <div class="bg-white shadow rounded">
        <div class="flex justify-between items-center px-4 py-3 border-b">
            <span class="font-semibold text-gray-700">ユーザー情報</span>
            <button type="button" onclick="window.location.href='{{ route('account.edit') }}'" class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-600">アカウント編集</button>
        </div>
        <div class="px-4 py-3 space-y-1 text-gray-700">
            <p><strong>ユーザー名：</strong> {{ $user->name ?? '' }}</p>
            <p><strong>名前：</strong> {{ $user->name_kanji ?? '' }}</p>
            <p><strong>名前(カナ)：</strong> {{ $user->name_kana ?? '' }}</p>
            <p><strong>メールアドレス：</strong> {{ $user->email ?? '' }}</p>
        </div>
    </div>

    <!-- 出品商品 -->
    <div class="bg-white shadow rounded">
        <div class="flex justify-between items-center px-4 py-3 border-b">
            <span class="font-semibold text-gray-700">＜出品商品＞</span>
            <button type="button" onclick="window.location.href='{{ route('products.create') }}'" class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-600">新規登録</button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">商品番号</th>
                        <th class="px-4 py-2">商品名</th>
                        <th class="px-4 py-2">商品説明</th>
                        <th class="px-4 py-2">料金(¥)</th>
                        <th class="px-4 py-2">編集</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $product->id }}</td>
                            <td class="px-4 py-2">{{ $product->name }}</td>
                            <td class="px-4 py-2">{{ $product->description }}</td>
                            <td class="px-4 py-2">¥{{ number_format($product->price) }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('products.show', $product->id) }}" class="bg-green-500 text-white text-xs px-3 py-1 rounded hover:bg-green-600">編集</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">出品商品はありません</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- 購入商品 -->
    <div class="bg-white shadow rounded">
        <div class="px-4 py-3 border-b font-semibold text-gray-700">
            ＜購入商品＞
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">商品名</th>
                        <th class="px-4 py-2">商品説明</th>
                        <th class="px-4 py-2">料金(¥)</th>
                        <th class="px-4 py-2">個数</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($purchasedProducts as $order)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $order->product->name }}</td>
                            <td class="px-4 py-2">{{ $order->product->description }}</td>
                            <td class="px-4 py-2">¥{{ number_format($order->product->price) }}</td>
                            <td class="px-4 py-2">{{ $order->quantity }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">購入商品はありません</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

