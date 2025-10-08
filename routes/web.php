<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LikeController;


Route::get('/', fn () => redirect()->route('products.index'));


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class); 
    Route::get('products/search', [ProductController::class, 'search'])
        ->name('products.search');


    // 購入
    Route::post('/products/{product}/purchase', [OrderController::class, 'store'])->name('purchase.store');
    // 商品詳細ページ
    Route::get('/products/{id}/detail', [ProductController::class, 'detail'])->name('products.detail');

    // カート
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/cart/complete', [CartController::class, 'complete'])->name('cart.complete');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');


    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');

    // アカウント編集画面表示
    Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');

    // アカウント情報更新
    Route::put('/account/update', [AccountController::class, 'update'])->name('account.update');
    // いいね
    Route::post('/products/{product}/like', [LikeController::class, 'toggle'])->name('likes.toggle');
});

require __DIR__.'/auth.php';
