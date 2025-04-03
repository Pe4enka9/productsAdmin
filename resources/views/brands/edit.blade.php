@extends('layouts.main')
@section('css', asset('css/form.css'))
@section('title', 'Изменить бренд')

@section('content')
    <form action="{{ route('brands.update', $brand) }}" method="post">
        @csrf
        @method('PATCH')

        <h1 class="mb-2">Изменить бренд</h1>

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ $brand->name }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="buttons">
            <button type="submit" class="btn">Изменить</button>
            <a href="{{ route('brands.index') }}" class="btn danger">Отмена</a>
        </div>
    </form>
@endsection
