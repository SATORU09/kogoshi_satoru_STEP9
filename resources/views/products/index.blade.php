@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 space-y-6">

    <!-- タイトル -->
    <h2 class="text-2xl font-bold text-gray-800">商品一覧</h2>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('products.index') }}" class="bg-white shadow rounded p-4 space-y-4">
        <div class="flex flex-wrap gap-4 items-center">
            <input type="text" name="keyword" placeholder="商品名を入力" value="{{ request('keyword') }}"
                   class="border border-gray-300 rounded px-3 py-2 w-full sm:w-64 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="number" name="min_price" placeholder="最低価格" value="{{ request('min_price') }}"
                   class="border border-gray-300 rounded px-3 py-2 w-full sm:w-32 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <span class="text-gray-500">〜</span>
            <input type="number" name="max_price" placeholder="最高価格" value="{{ request('max_price') }}"
                   class="border border-gray-300 rounded px-3 py-2 w-full sm:w-32 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm">
                検索
            </button>
        </div>
    </form>

    <!-- 商品一覧テーブル -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700 border border-gray-200">
            <thead class="bg-gray-100 text-gray-800">
                <tr>
                    <th class="px-4 py-2 border">商品番号</th>
                    <th class="px-4 py-2 border">商品名</th>
                    <th class="px-4 py-2 border">商品説明</th>
                    <th class="px-4 py-2 border">画像</th>
                    <th class="px-4 py-2 border">料金(¥)</th>
                    <th class="px-4 py-2 border">詳細</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products->sortBy('id') as $product)
                    @if($product->user_id !== auth()->id())
                        <tr class="border-t">
                            <td class="px-4 py-2 border">{{ $product->id }}</td>
                            <td class="px-4 py-2 border">{{ $product->name }}</td>
                            <td class="px-4 py-2 border">{{ $product->description }}</td>
                            <td class="px-4 py-2 border">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" class="w-16 h-auto mx-auto">
                                @else
                                    <span class="text-gray-400">なし</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border">¥{{ number_format($product->price) }}</td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 text-sm">
                                    詳細
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

