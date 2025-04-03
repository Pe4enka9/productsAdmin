<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    // Форма регистрации
    public function showRegisterForm(): View
    {
        return view('users.register');
    }

    // Регистрация
    public function register(RegisterRequest $request): RedirectResponse
    {
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('users.login');
    }

    // Форма авторизации
    public function showLoginForm(): View
    {
        return view('users.login');
    }

    // Авторизация
    public function login(LoginRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return redirect()->route('users.login')
                ->withErrors(['auth' => 'Неверный логин или пароль'])
                ->withInput();
        }

        auth()->login($user, true);

        return redirect()->route('users.dashboard');
    }

    // Выход
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('users.login');
    }

    // Главная страница
    public function dashboard(): View
    {
        return view('users.dashboard');
    }
}
