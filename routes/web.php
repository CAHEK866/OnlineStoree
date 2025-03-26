<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;

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
 
Route::get('/', [ProductController::class, 'index'])->name('product.index')->middleware('auth');;
Route::get('/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');;
Route::post('/', [ProductController::class, 'store'])->name('product.store')->middleware('auth');;
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');;
Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');;
Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');


Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
