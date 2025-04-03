@extends('layouts.main')
@section('title', 'Товары')

@section('content')
    <a href="{{ route('users.dashboard') }}">Домой</a>

    <h1>Товары</h1>

    <a href="{{ route('products.create') }}">Добавить</a>

    <table>
        <thead>
        <tr>
            <td>#</td>
            <td>Название</td>
            <td>Slug</td>
            <td>Цена</td>
            <td>Категория</td>
            <td>Бренд</td>
        </tr>
        </thead>

        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->brand->name }}</td>
                <td><a href="{{ route('products.edit', $product) }}">Изменить</a></td>
                <td>
                    <form action="{{ route('products.destroy', $product) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
