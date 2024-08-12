<?php

use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(["middleware"=> [AdminAuthMiddleware::class]], function () {

    Route::get("/dashboard", [HomeController::class,"index"])->name("admin.index");



    Route::get("/product-list", [ProductController::class,"ProductList"])->name("admin.product.list");
    Route::get("/product-create", [ProductController::class,"ProductShow"])->name("admin.product.show");
    Route::post("/product-create", [ProductController::class,"ProductCreate"])->name("admin.product.create");
    Route::get("/product-delete/{product}", [ProductController::class,"ProductDelete"])->name("admin.product.delete");
    Route::get("/product-update/{product}", [ProductController::class,"ProductEdit"])->name("admin.product.edit");
    Route::post("/product-update/{product}", [ProductController::class,"ProductUpdate"])->name("admin.product.update");
    Route::get("/product-detail/{product}", [ProductController::class,"ProductDetail"])->name("admin.product.detail");



    Route::get("/categories-list", [CategoryController::class,"CategoriesList"])->name("admin.categories.list");
    Route::get("/categories-create", [CategoryController::class,"CategoriesShow"])->name("admin.categories.show");
    Route::post("/categories-create", [CategoryController::class,"CategoriesCreate"])->name("admin.categories.create");
    Route::get("/categories-update/{categoryy}", [CategoryController::class,"CategoriesEdit"])->name("admin.categories.edit");
    Route::post("/categories-update/{categoryy}", [CategoryController::class,"CategoriesUpdate"])->name("admin.categories.update");
    Route::get("/categories-delete/{category}", [CategoryController::class,"CategoriesDelete"])->name("admin.categories.delete");

    

    Route::get("/comment-list",[CommentController::class,"CommentList"])->name("admin.comment.list");
    Route::get("/comment-update/{comment}",[CommentController::class,"CommentEdit"])->name("admin.comment.edit");
    Route::post("/comment-list/{comment}",[CommentController::class,"CommentUpdate"])->name("admin.comment.update");



    Route::get("/user-list",[UserController::class,"UserList"])->name("admin.user.list");
    Route::get("/user-delete/{user}",[UserController::class,"UserDelete"])->name('admin.user.delete');
    Route::get('/user-detail/{user}',[UserController::class,'UserDetail'])->name('admin.user.detail');



    Route::get('/contact-list',[ContactController::class,'ContactList'])->name('admin.contact.list');
    Route::get('/contact-update/{contact}',[ContactController::class,'ContactEdit'])->name('admin.contact.edit');
    Route::post('/contact-update/{contact}',[ContactController::class,'ContactUpdate'])->name('admin.contact.update');
    Route::get('/contact-delete({contact}',[ContactController::class,'ContactDelete'])->name('admin.contact.delete');



    Route::get('/order-list',[OrderController::class,'OrderList'])->name('admin.order.list');
    Route::get('/order-detail/{order}',[OrderController::class,'OrderDetail'])->name('admin.order.detail');
    Route::get('/order-delete/{order}',[OrderController::class,'OrderDelete'])->name('admin.order.delete');
    Route::get('/order-update/{order}',[OrderController::class,'OrderEdit'])->name('admin.order.edit');
    Route::post('/order-update/{order}',[OrderController::class,'OrderUpdate'])->name('admin.order.update');



    Route::get('/card-list',[CardController::class,'CardList'])->name('admin.card.list');
    Route::get('/card-delete/{card}',[CardController::class,'CardDelete'])->name('admin.card.delete');
    Route::get('/card-update/{card}',[CardController::class,'CardEdit'])->name('admin.card.edit');
    Route::post('/card-update/{card}',[CardController::class,'CardUpdate'])->name('admin.card.update');
});