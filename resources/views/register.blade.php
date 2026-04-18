@extends('layout')

@section('content')
<main class="container mx-auto px-5">
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <input type="text" placeholder="login" name="login" value="{{ old('login') }}">
        <input type="text" placeholder="фио" name="fio" value="{{ old('fio') }}">
        <input type="email" placeholder="email" name="email" value="{{ old('email') }}">
        <input type="phone" placeholder="phone" name="phone" value="{{ old('phone') }}">
        <input type="password" placeholder="password" name="password" value="{{ old('password') }}">
        <button>Создать пользователя</button>
        <a href="{{ route('login') }}">Уже зарегистрированы? - войти</a>
    </form>
</main>
@endsection
