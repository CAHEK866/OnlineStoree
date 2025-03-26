<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // Импортируем правильный класс для аутентификации
use Illuminate\Notifications\Notifiable;  // Импортируем трейт для уведомлений
use Illuminate\Database\Eloquent\Factories\HasFactory;  // Для использования фабрики моделей

class User extends Authenticatable  // Наследуемся от Authenticatable для правильной работы с аутентификацией
{
    use HasFactory, Notifiable;  // Добавляем необходимые трейты

    // Заполняемые поля
    protected $fillable = ['name', 'email', 'password'];  // Включаем 'password' для безопасности

    // Скрытые поля (например, пароль)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Кастинг данных
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Связь один ко многим с транзакциями
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Связь один ко многим с заказами
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
