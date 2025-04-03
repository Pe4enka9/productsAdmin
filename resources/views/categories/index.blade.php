@extends('layouts.main')
@section('title', 'Категории')

@section('content')
    <a href="{{ route('users.dashboard') }}">Домой</a>

    <h1>Категории</h1>

    <a href="{{ route('categories.store') }}">Добавить</a>

    <table>
        <thead>
        <tr>
            <td>#</td>
            <td>Название</td>
        </tr>
        </thead>

        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td><a href="{{ route('categories.edit', $category) }}">Изменить</a></td>
                <td>
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
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
