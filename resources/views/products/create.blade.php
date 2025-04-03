@extends('layouts.main')
@section('title', 'Добавить товар')

@section('content')
    <h1>Добавить товар</h1>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}">
            @error('slug') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="price">Цена</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}">
            @error('price') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="images">Изображения</label>
            <input type="file" name="images[]" id="images" multiple>
            @error('images') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input-container">
            <label for="brand_id">Бренд</label>
            <select name="brand_id" id="brand_id">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Добавить</button>
    </form>
@endsection
