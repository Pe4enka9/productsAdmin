@extends('layouts.main')
@section('title', 'Добавить категорию')

@section('content')
    <h1>Добавить категорию</h1>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="parent_id">Родитель</label>
            <select name="parent_id" id="parent_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('parent_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Добавить</button>
    </form>
@endsection
