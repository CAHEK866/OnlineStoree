<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Связь с заказами через промежуточную таблицу
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }
}
