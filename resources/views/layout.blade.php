<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <header class="bg-indigo-800 flex justify-between items-center text-white py-3 px-6">
        <a href="{{ route('home') }}">KorkiNET</a>
        <nav>
            <a href="{{ route('apps') }}">Заявки</a>
            <a href="{{ route('create-apps') }}">Создать заявку</a>
        </nav>
        @guest
        <article>
            <a href="{{ route('register') }}">Создать аккаунт</a>
            <a href="{{ route('login') }}">Войти</a>
        </article>
        @endguest
        @if(Auth::user() && Auth::user()->login === 'Admin')
        <a href="{{ route('admin') }}">Админ-панель</a>
        @endif
        @auth
        <a href="{{ route('logout') }}">Выйти</a>
        @endauth
    </header>
    @yield('content')
</body>
</html>
