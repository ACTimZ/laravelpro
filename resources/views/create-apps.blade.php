@extends('layout')

@section('title')
@endsection

@section('content')
    <h1>Создайте заявку на обучение:</h1>
    <form action="{{ route('create-apps-store') }}" method="POST">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @csrf
        <input type="text" placeholder="Название курса" name="course_name" value="{{ old('course_name') }}">
        <input type="date" placeholder="Дата" name="date" value="{{ old('date') }}">
        <select name="payment" id="payment" placeholder="Способ оплаты">
            <option value="cash">Наличными</option>
            <option value="transfit">Переводом по номеру телефона</option>
        </select>
        <button type="submit">Отправить</button>
    </form>
@endsection
