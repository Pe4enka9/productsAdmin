@extends('layouts.main')
@section('title', 'Изменить товар')

@section('content')
    <h1>Изменить товар</h1>

    <form action="{{ route('products.update', $product) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug">
            @error('slug') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="price">Цена</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}">
            @error('price') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}" {{ $product->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-container">
            <label for="brand_id">Бренд</label>
            <select name="brand_id" id="brand_id">
                @foreach($brands as $brand)
                    <option
                        value="{{ $brand->id }}" {{ $product->category_id === $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Изменить</button>
    </form>
@endsection
