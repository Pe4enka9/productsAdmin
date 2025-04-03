<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{
    // Все бренды
    public function index(): View
    {
        $brands = Brand::all();

        return view('brands.index', [
            'brands' => $brands,
        ]);
    }

    // Форма добавления бренда
    public function create(): View
    {
        return view('brands.create');
    }

    // Добавление бренда
    public function store(BrandRequest $request): RedirectResponse
    {
        Brand::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('brands.index');
    }

    // Форма редактирования бренда
    public function edit(Brand $brand): View
    {
        return view('brands.edit', [
            'brand' => $brand,
        ]);
    }

    // Редактирование бренда
    public function update(BrandRequest $request, Brand $brand): RedirectResponse
    {
        $brand->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('brands.index');
    }

    // Удаление бренда
    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()->route('brands.index');
    }
}
