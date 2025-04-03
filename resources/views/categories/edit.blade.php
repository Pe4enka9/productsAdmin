@extends('layouts.main')
@section('css', asset('css/form.css'))
@section('title', 'Изменить категорию')

@section('content')

    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('PATCH')

        <h1 class="mb-2">Изменить категорию</h1>

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="parent_id">Родитель</label>
            <select name="parent_id" id="parent_id">
                <option value="0">Нет</option>
                @foreach($categories as $parent)
                    <option value="{{ $parent->id }}" {{ $parent->id === $category->parent_id ? 'selected' : '' }} {{ $parent->id === $category->id ? 'hidden' : '' }}>{{ $parent->name }}</option>
                @endforeach
            </select>
            @error('parent_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="buttons">
            <button type="submit" class="btn">Изменить</button>
            <a href="{{ route('categories.index') }}" class="btn danger">Отмена</a>
        </div>
    </form>
@endsection
