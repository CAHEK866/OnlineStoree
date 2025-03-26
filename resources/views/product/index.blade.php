@extends('layout')

@section('title', 'Все товары')

@section('header', 'Все товары')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
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
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Редактировать</a> |
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить новый товар</a>

    <form method="GET" action="{{ route('product.index') }}" class="mt-3">
        <label for="perpage">Товары на странице:</label>
        <select name="perpage" id="perpage" class="form-select" onchange="this.form.submit()">
            <option value="5" {{ request('perpage') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('perpage') == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ request('perpage') == 15 ? 'selected' : '' }}>15</option>
        </select>
    </form>

    <div class="mt-3">
        {{ $products->appends(['perpage' => request('perpage')])->links() }}
    </div>
@endsection
