<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Метод для вывода всех пользователей
    public function index()
    {
        $users = User::all();  // Получаем всех пользователей
        return view('users.index', compact('users'));  
    }

    // Метод для вывода данных конкретного пользователя с транзакциями
    public function show($id)
    {
        $user = User::findOrFail($id);  // Находим пользователя по ID
        return view('users.show', compact('user')); 
    }
}