<?php

namespace App\Http\Requests;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique(Product::class, 'slug')],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'array', 'mimes:jpg,png,jpeg', 'max:2048'],
            'category_id' => ['required', 'integer', Rule::exists(Category::class, 'id')],
            'brand_id' => ['required', 'integer', Rule::exists(Brand::class, 'id')],
        ];
    }
}
