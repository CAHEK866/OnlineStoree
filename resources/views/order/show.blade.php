<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Детали заказа №{{ $order->id }}</title>
</head>
<body>

<h1>{{ $order ? "Список товаров заказа №" . $order->id : 'Неверный ID заказа' }}</h1>

@if($order)
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Наименование</td>
            <td>Цена</td>
            <td>Количество</td>
            <td>Общая стоимость</td>
        </tr>

        @foreach ($order->products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->pivot->price }} ₽</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->pivot->quantity * $product->pivot->price }} ₽</td>
            </tr>
        @endforeach
    </table>
    <h2>Итого: {{ $total->total }} ₽</h2>
@endif

</body>
</html>
