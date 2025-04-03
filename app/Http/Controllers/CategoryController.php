<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    // Все категории
    public function index(): View
    {
        $categories = Category::all();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    // Форма добавления категории
    public function create(): View
    {
        return view('categories.create');
    }

    // Добавление категории
    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index');
    }

    // Форма редактирования категории
    public function edit(Category $category): View
    {
        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    // Редактирование категории
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index');
    }

    // Удаление категории
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
