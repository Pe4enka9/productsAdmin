@extends('layouts.main')
@section('css', asset('css/form.css'))
@section('title', 'Добавить категорию')

@section('content')

    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <h1 class="mb-2">Добавить категорию</h1>

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="parent_id">Родитель</label>
            <select name="parent_id" id="parent_id">
                <option value="0">Нет</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('parent_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="buttons">
            <button type="submit" class="btn">Добавить</button>
            <a href="{{ route('categories.index') }}" class="btn danger">Отмена</a>
        </div>
    </form>
@endsection
