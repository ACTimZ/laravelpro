@extends('layout')

@section('title')
    Авторизация
@endsection

@section('content')
    <main>
        <form action="{{ route('login-store') }}" method="POST" class="flex flex-col items-start gap-5">
            @error('login')
                <p>{{ $message }}</p>
            @enderror
            @csrf
            <input type="text" placeholder="login" name="login" value="{{ old('login') }}">
            <input type="password" placeholder="Пароль" name="password">
            <button type="submit">Войти</button>
            <a href="{{ route('register') }}">"Еще не зарегистрированы?
                Регистрация</a>
        </form>
    </main>
@endsection
