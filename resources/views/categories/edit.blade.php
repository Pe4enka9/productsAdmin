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

        <button type="submit">Изменить</button>
    </form>
@endsection
