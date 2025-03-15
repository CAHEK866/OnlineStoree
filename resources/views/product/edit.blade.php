<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование товара</title>
</head>
<body>

    <h1>Редактирование товара</h1>

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="product_name">Наименование:</label>
            <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" required>
            @error('product_name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="price">Новая цена:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required>
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="image">Изображение (по желанию):</label>
            <input type="file" id="image" name="image">
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Обновить карточку товара</button>
    </form>

    <br>
    <a href="{{ route('product.index') }}">Обратно к товарам</a>

</body>
</html>
