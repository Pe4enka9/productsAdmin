@extends('layouts.main')
@section('css', asset('css/card.css'))
@section('title', 'Бренды')

@section('content')
    <a href="{{ route('users.dashboard') }}" class="btn home mb-2">Домой <img src="{{ asset('icons/house.svg') }}"
                                                                              alt="House"></a>

    <h1 class="mb-2">Бренды</h1>

    <a href="{{ route('brands.create') }}" class="btn mb-2">Добавить</a>

    <section class="grid">
        @foreach($brands as $brand)
            <div class="card">
                <h2 class="mb-2">{{ $brand->name }}</h2>

                <div class="actions">
                    <a href="{{ route('brands.edit', $brand) }}" class="btn">Изменить</a>

                    <form action="{{ route('brands.destroy', $brand) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn danger">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
@endsection
