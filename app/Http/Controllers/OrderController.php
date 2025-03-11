<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show(string $id)
    {
        // Подсчитываем общую сумму заказа
        $total = DB::table('orders')
            ->selectRaw('sum(order_product.price * order_product.quantity) as total') // Суммируем цену и количество
            ->join('order_product', 'orders.id', '=', 'order_product.order_id') // Соединяем таблицы orders и order_product
            ->join('products', 'products.id', '=', 'order_product.product_id') // Соединяем таблицы order_product и products
            ->where('orders.id', $id) // Фильтруем по ID заказа
            ->first();

        // Передаем данные в представление
        return view('order.show', [
            'order' => Order::where('id', $id)->first(),
            'total' => $total
        ]);
    }
}
