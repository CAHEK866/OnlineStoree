<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление нового товара</title>
</head>
<body>

    <h1>Добавить новый товар</h1>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="product_name">Наименование:</label>
            <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
            @error('product_name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="price">Цена:</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="image">Изображение (по желанию):</label>
            <input type="file" id="image" name="image">
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Добавить товар</button>
    </form>

    <br>
    <a href="{{ route('product.index') }}">Обратно к товарам</a>

</body>
</html>
