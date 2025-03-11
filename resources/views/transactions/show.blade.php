<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Транзакция ID: {{ $transaction->id }}</title>
</head>
<body>
    <h2>Транзакция ID: {{ $transaction->id }}</h2>
    <p>Цена: {{ $transaction->order_price }} руб.</p>
    <p>Дата: {{ $transaction->time_order }}</p>
    <p>Адрес: {{ $transaction->address }}</p>

    <h3>Пользователь:</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->user->email }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
