@extends('layout')

@section('content')
<main class="container mx-auto px-5">
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <input type="text" placeholder="login" name="login" value="{{ old('login') }}">
        <input type="password" placeholder="password" name="password" value="{{ old('password') }}">
        <button>Войти</button>
        <a href="{{ route('login') }}">Еще не зарегистрировались? Создать аккаунт</a>
    </form>
</main>
@endsection
