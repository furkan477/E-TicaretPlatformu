<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CommentController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'LoginShow'])->name('login.show');
Route::post('/login', [AuthController::class,'Login'])->name('login');
Route::get('/register', [AuthController::class,'RegisterShow'])->name('register.show');
Route::post('/register', [AuthController::class,'Register'])->name('register');

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class,'Logout'])->name('logout');

    Route::get('/', [HomeController::class,'index'])->name('index');
    Route::get('/profile/{user}', [HomeController::class,'Profile'])->name('profile');
    Route::get('/contact',[HomeController::class,'Contact'])->name('contact');
    Route::post('/contact', [HomeController::class,'ContactCreate'])->name('contact.create');
    Route::post('/address', [HomeController::class,'Address'])->name('address');
    Route::post('/address-update',[HomeController::class,'AddressUpdate'])->name('address.update');
    Route::get('/address-delete/{address}',[HomeController::class,'AddressDelete'])->name('address.delete');



    Route::get('/product-detail/{product}', [ProductController::class,'ProductDetail'])->name('product.detail');


    Route::post('/comment-create/{product}', [CommentController::class,'CommentCreate'])->name('comment.create');
    Route::get('/comment-delete/{comment}   ', [CommentController::class,'CommentDelete'])->name('comment.delete');


    Route::get('/cart/{user}',[CartController::class,'CartList'])->name('cart.list');
    Route::post('cart-create',[CartController::class,'CartAdd'])->name('cart.add');



    Route::get('/orders/{user}',[OrderController::class,'Orders'])->name('orders');
    Route::post('/order-create',[OrderController::class,'OrderCreate'])->name('order.create');
    Route::post('/order-process',[OrderController::class,'OrderProcess'])->name('order.process');

    Route::get('/order-detail/{order}',[OrderController::class,'OrderDetail'])->name('order.detail');
    Route::get('/order-delete/{order}',[OrderController::class,'OrderDelete'])->name('order.delete');

});