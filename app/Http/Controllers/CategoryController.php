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

        $allCategories = Category::all();

        return view('categories.index', [
            'categories' => $categories,
            'allCategories' => $allCategories,
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
        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        if ($request->input('parent_id') !== '0') {
            $category->parent_id = $request->input('parent_id');
            $category->save();
        }

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
        ]);

        if ($request->input('parent_id') !== '0') {
            $category->parent_id = $request->input('parent_id');
        } else {
            $category->parent_id = null;
        }

        $category->save();

        return redirect()->route('categories.index');
    }

    // Удаление категории
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
