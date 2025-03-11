<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['order_price', 'time_order', 'address', 'user_id'];

    // Связь "обратно" — транзакция принадлежит пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

