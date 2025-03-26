<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->input('perpage', 5);
        $products = Product::paginate($perpage)->withQueryString();
        return view('product.index', compact('products'));
    }
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product($validated);

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Товар добавлен!');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();
        return redirect()->route('product.index')->with('success', 'Товар обновлен!');
    }
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
    
        // Проверяем, есть ли у пользователя права для удаления товара
        if (Gate::denies('destroy-product', $product)) {
            // Если прав нет, возвращаем на страницу списка товаров с сообщением
            return redirect()->route('product.index')->with('error', 'У вас нет разрешения на удаление товара номер ' . $id);
        }
    
        // Если разрешение есть, удаляем товар
        Product::destroy($id);
    
        // После удаления редиректим обратно на список товаров с успешным сообщением
        return redirect()->route('product.index')->with('success', 'Товар удален!');
    }
    

}


