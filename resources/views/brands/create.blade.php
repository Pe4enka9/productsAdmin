@extends('layouts.main')
@section('title', 'Добавить бренд')

@section('content')
    <h1>Добавить бренд</h1>

    <form action="{{ route('brands.store') }}" method="post">
        @csrf

        <div class="input-container">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Добавить</button>
    </form>
@endsection
