@extends('layouts.main')
@section('css', asset('css/product_card.css'))
@section('title', 'Товары')

@section('content')
    <a href="{{ route('users.dashboard') }}" class="btn home mb-2">Домой <img src="{{ asset('icons/house.svg') }}"
                                                                              alt="House"></a>

    <h1 class="mb-2">Товары</h1>

    <a href="{{ route('products.create') }}" class="mb-2 btn">Добавить</a>

    <section class="grid">
        @foreach($products as $product)
            <div class="product-card">
                @if($product->images->isNotEmpty())
                    <div class="img-container">
                        <img src="{{ asset('storage/' . $product->images[0]->image) }}" alt="Product Image">
                    </div>
                @endif

                <h2>{{ $product->name }}</h2>
                <p>{{ $product->slug }}</p>
                <p class="price">{{ $product->price }} ₽</p>

                <div class="details mb-2">
                    <p>Категория: {{ $product->category->name }}</p>
                    <p>Бренд: {{ $product->brand->name }}</p>
                </div>

                <div class="actions">
                    <a href="{{ route('products.edit', $product) }}" class="btn">Изменить</a>

                    <form action="{{ route('products.destroy', $product) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn danger">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
@endsection
