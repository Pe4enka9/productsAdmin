@extends('layouts.main')
@section('title', 'Авторизация')

@section('content')
    <h1>Авторизация</h1>

    <form action="{{ route('users.login') }}" method="post">
        @csrf

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

        @error('auth') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">Войти</button>
    </form>
@endsection
