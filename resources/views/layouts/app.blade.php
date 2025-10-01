<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        header h1 {
            font-size: 1.2rem;
            margin: 0;
        }
        .header-logo {
            font-size: 1.5rem;
            margin: 0;
        }
        .nav {
            display: flex;
            align-items: center;
            gap: 30px;
        }
        .header-links {
            display: flex;
            gap: 15px;
        }
        .header-links a {
            text-decoration: none;
            color:rgb(15, 126, 245);
            font-size: 0.9rem;
        }
        .header-links a:hover {
            color:rgb(11, 73, 139);
        }
        .header-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .logout-button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout-button:hover {
            background:rgb(139, 14, 26);
        }
        main {
            flex: 1;
            padding: 20px;
        }
        footer {
            text-align: center;
            background:#fff;
            padding: 20px;
            border-top: 1px solid #ddd;
        }
        footer-links {
            margin: 10px 0;
        }
        footer a {
            margin: 0 10px;
            text-decoration: none;
            color:rgb(15, 126, 245);
        }
        footer a:hover {
            color:rgb(11, 73, 139);
        }
        .contact-button {
            display: inline-block;
            padding: 6px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background: #007bff;
            color: white;
        }
        .contact-button:hover {
            background-color: #0056b3;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-logo">Animal Cat</div>
            <div class="nav">
                <div class="header-links">
                    <a href="{{ route('products.index') }}">Home</a>
                    <a href="{{ route('mypage') }}">マイページ</a>
                </div>
                <div class="header-user">
                    <h1>ログイン中のユーザー：{{ Auth::user()->name }}</h1>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-button">ログアウト</button>
                    </form>
                </div>
            </div>
            <!-- ナビゲーションなど -->
        </header>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        <footer>
            <div class="footer-links">
                <form method="GET" action="{{ route('contact.show') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="contact-button">お問い合わせ</button>
                </form>
                <a href="{{ route('products.index') }}">Home</a>
                <a href="{{ route('mypage') }}">マイページ</a>
            </div>
            <p>CatCompany © 2025 My App</p>
            <p>Powered by CatCompany</p>
        </footer>
    </div>
</body>
</html>

