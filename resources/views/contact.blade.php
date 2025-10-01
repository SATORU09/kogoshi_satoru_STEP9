@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="form-box">
        <h1>お問い合わせフォーム</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('contact.send') }}">
            @csrf

            <!-- 名前 -->
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- お問い合わせ内容 -->
            <div class="form-group">
                <label for="message">お問い合わせ内容</label>
                <textarea id="message" name="message" rows="5">{{ old('message') }}</textarea>
                @error('message')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- ボタン -->
            <div class="button-box">
                <button type="submit" class="btn btn-submit">送信</button>
                <button type="button" onclick="window.location.href='{{ route('products.index') }}'"
                        class="btn btn-back">戻る</button>
            </div>
        </form>
    </div>
</div>

<style>
    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
        background: #f9fafb;
    }
    .form-box {
        width: 100%;
        max-width: 500px;
        background: white;
        padding: 24px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .form-box h1 {
        text-align: center;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px;
        font-size: 1rem;
    }
    .error {
        color: red;
        font-size: 0.875rem;
        margin-top: 4px;
    }
    .success {
        color: green;
        text-align: center;
        margin-bottom: 15px;
    }
    .button-box {
        display: flex;
        justify-content: center;
        gap: 12px;
    }
    .btn {
        padding: 8px 16px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        color: white;
        font-size: 1rem;
    }
    .btn-submit {
        background-color: #2563eb;
    }
    .btn-submit:hover {
        background-color: #1e40af;
    }
    .btn-back {
        background-color: #6b7280;
    }
    .btn-back:hover {
        background-color: #4b5563;
    }
</style>
@endsection




