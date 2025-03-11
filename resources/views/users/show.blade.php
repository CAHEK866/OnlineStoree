<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Транзакции пользователя: {{ $user->name }}</title>
</head>
<body>
    <h2>Транзакции пользователя: {{ $user->name }}</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID транзакции</th>
                <th>Цена</th>
                <th>Дата</th>
                <th>Адрес</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->order_price }} руб.</td>
                    <td>{{ $transaction->time_order }}</td>
                    <td>{{ $transaction->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
