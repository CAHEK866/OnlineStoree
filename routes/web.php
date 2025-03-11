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