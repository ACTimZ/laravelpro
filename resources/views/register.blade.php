@extends('layout')

@section('title')
Регистрация
@endsection

@section('content')
<main>
    <form action="{{ route('register-store') }}" method="POST" class="flex flex-col items-start gap-5">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        @csrf
        <input type="text" placeholder="login" name="login" value="{{ old('login') }}">
        <input type="text" placeholder="ФИО" name="fio" value="{{ old('fio') }}">
        <input type="password" placeholder="Пароль" name="password" value="{{ old('password') }}">
        <input type="phone" placeholder="8(XXX)XXX-XX-XX" name="phone" value="{{ old('phone') }}">
        <input type="email" placeholder="example@example.ru" name="email" value="{{ old('email') }}">
        <button type="submit">Создать пользователя</button>
        <a href="{{ route('login') }}">Уже зарегистрировались? Войти</a>
    </form>
</main>
@endsection
