@extends('layouts.main')
@section('title', 'Главная')

@section('content')
    <form action="{{ route('users.logout') }}" method="post">
        @csrf
        <button type="submit">Выйти</button>
    </form>

    <h1>Главная</h1>

    <a href="{{ route('categories.index') }}">Категории</a>
    <a href="{{ route('brands.index') }}">Бренды</a>
    <a href="{{ route('products.index') }}">Товары</a>
@endsection
