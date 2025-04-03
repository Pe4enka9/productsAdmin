@extends('layouts.main')
@section('title', 'Бренды')

@section('content')
    <a href="{{ route('users.dashboard') }}">Домой</a>

    <h1>Бренды</h1>

    <a href="{{ route('brands.create') }}">Добавить</a>

    <table>
        <thead>
        <tr>
            <td>#</td>
            <td>Название</td>
        </tr>
        </thead>

        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td><a href="{{ route('brands.edit', $brand) }}">Изменить</a></td>
                <td>
                    <form action="{{ route('brands.destroy', $brand) }}" method="post">
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
