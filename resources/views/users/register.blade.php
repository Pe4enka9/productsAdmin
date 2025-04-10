@extends('layouts.main')
@section('css', asset('css/form.css'))
@section('title', 'Регистрация')

@section('content')
    <form action="{{ route('users.register') }}" method="post">
        @csrf

        <h1 class="mb-2">Регистрация</h1>

        <div class="input-container">
            <label for="first_name">Имя</label>
            <input type="text" name="first_name" id="first_name" placeholder="Иван" value="{{ old('first_name') }}">
            @error('first_name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="last_name">Фамилия</label>
            <input type="text" name="last_name" id="last_name" placeholder="Иванов" value="{{ old('last_name') }}">
            @error('last_name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="your_email@example.com" value="{{ old('email') }}">
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="paSSword1">
            @error('password') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn">Зарегистрироваться</button>
    </form>
@endsection
