@extends('layouts.main')
@section('css', asset('css/form.css'))
@section('title', 'Добавить бренд')

@section('content')
    <form action="{{ route('brands.store') }}" method="post">
        @csrf

        <h1 class="mb-2">Добавить бренд</h1>

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="buttons">
            <button type="submit" class="btn">Добавить</button>
            <a href="{{ route('brands.index') }}" class="btn danger">Отмена</a>
        </div>
    </form>
@endsection
