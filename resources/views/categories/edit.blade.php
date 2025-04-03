@extends('layouts.main')
@section('title', 'Изменить категорию')

@section('content')
    <h1>Изменить категорию</h1>

    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="parent_id">Родитель</label>
            <select name="parent_id" id="parent_id">
                @foreach($categories as $parent)
                    <option value="{{ $parent->id }}" {{ $parent->id === $category->parent_id ? 'selected' : '' }}>{{ $parent->name }}</option>
                @endforeach
            </select>
            @error('parent_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Изменить</button>
    </form>
@endsection
