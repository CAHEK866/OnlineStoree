<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title'=>'Hello world!']);
});
// Список всех пользователей
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Транзакции конкретного пользователя
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// Транзакции по ID
Route::get('/transactions/{id}', [TransactionController::class, 'show']);

Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/', [ProductController::class, 'store'])->name('product.store');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
