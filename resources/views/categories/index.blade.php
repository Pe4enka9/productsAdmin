@extends('layouts.main')
@section('css', asset('css/categories.css'))
@section('title', 'Категории')

@section('content')
    <a href="{{ route('users.dashboard') }}" class="mb-2 btn home">Домой <img src="{{ asset('icons/house.svg') }}"
                                                                              alt="House"></a>

    <h1 class="mb-2">Категории</h1>

    <a href="{{ route('categories.create') }}" class="mb-2 btn">Добавить</a>

    <div class="category-tree">
        <ul>
            @foreach($categories as $category)
                <li>{{ $category->name }}</li>

                <ul>
                    @foreach($category->childrenCategories as $childrenCategory)
                        @include('categories.children_categories', ['childrenCategory' => $childrenCategory])
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </div>

    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allCategories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td class="buttons">
                    <a href="{{ route('categories.edit', $category) }}" class="btn">Изменить</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
