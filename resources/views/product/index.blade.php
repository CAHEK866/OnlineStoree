<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все товары</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        a {
            color: blue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Все товары</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

   

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}">Редактировать</a> | 
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:blue; cursor:pointer;">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{ route('product.create') }}">Добавить новый товар</a>

     <form method="GET" action="{{ route('product.index') }}">
        <label for="perpage">Товары на странице:</label>
        <select name="perpage" id="perpage" onchange="this.form.submit()">
            <option value="5" {{ request('perpage') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('perpage') == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ request('perpage') == 15 ? 'selected' : '' }}>15</option>
        </select>
    </form>

    <div>
        {{ $products->appends(['perpage' => request('perpage')])->links() }} <!-- Пагинация с учетом параметра per_page -->
    </div>

</body>
</html>
