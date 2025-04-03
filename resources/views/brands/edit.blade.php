@extends('layouts.main')
@section('title', 'Изменить бренд')

@section('content')
    <h1>Изменить бренд</h1>

    <form action="{{ route('brands.update', $brand) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ $brand->name }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Изменить</button>
    </form>
@endsection
