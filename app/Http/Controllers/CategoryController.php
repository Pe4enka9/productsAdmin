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
        $categories = Category::whereNull('parent_id')
            ->with('childrenCategories')
            ->get();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    // Форма добавления категории
    public function create(): View
    {
        $categories = Category::all();

        return view('categories.create', [
            'categories' => $categories,
        ]);
    }

    // Добавление категории
    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->route('categories.index');
    }

    // Форма редактирования категории
    public function edit(Category $category): View
    {
        $categories = Category::all();

        return view('categories.edit', [
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    // Редактирование категории
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
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
