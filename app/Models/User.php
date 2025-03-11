<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email'];

    // Связь один ко многим с транзакциями
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function orders()
{
    return $this->hasMany(Order::class);
}

}
