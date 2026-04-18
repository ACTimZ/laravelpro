<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css')}}">
    <title>Корочки.есть</title>
</head>
<body>
    <header class="py-3 px-5 bg-indigo-800 text-white flex justify-between">
        <a href="{{ route('home') }}">Logo</a>
        <nav class="flex gap-5">
            <a href="{{ route('apps') }}">Заявки</a>
            <a href="{{ route('apps.create') }}">Создать заявку</a>
        </nav>
        @guest
        <article>
            <a href="{{ route('login') }}">Войти</a>
            <a href="{{ route('register') }}">Создать аккаунт</a>
        </article>
        @endguest
        @auth
        <a href="{{ route('logout') }}">Выйти</a>
        @endauth
        @if(Auth::check() && Auth::user()->login === 'Admin')
        <a href="{{ route('admin') }}">Админ-панель</a>
        @endif
    </header>
    @yield('content')
</body>
</html>
