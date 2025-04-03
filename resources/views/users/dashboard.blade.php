@extends('layouts.main')
@section('title', 'Главная')

@section('content')
    <form action="{{ route('users.logout') }}" method="post" class="mb-2">
        @csrf
        <button type="submit" class="btn danger">Выйти</button>
    </form>

    <h1 class="mb-2">Главная</h1>

    <div class="buttons">
        <a href="{{ route('categories.index') }}" class="btn">Категории</a>
        <a href="{{ route('brands.index') }}" class="btn">Бренды</a>
        <a href="{{ route('products.index') }}" class="btn">Товары</a>
    </div>
@endsection
