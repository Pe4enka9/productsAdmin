<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Все товары
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    // Форма добавления товара
    public function create(): View
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.create', [
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    // Добавление товара
    public function store(ProductRequest $request): RedirectResponse
    {
        $product = Product::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('name')),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect()->route('products.index');
    }

    // Форма редактирования товара
    public function edit(Product $product): View
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    // Редактирование товара
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('name')),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
        ]);

        return redirect()->route('products.index');
    }

    // Удаление товара
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
