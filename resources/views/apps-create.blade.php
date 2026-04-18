@extends('layout')

@section('content')
<main class="container mx-auto px-5">
    <h1>Создание заявки на обучение</h1>
    <form action="{{ route('apps.create.post') }}" method="POST">
        @csrf
        <input type="text" placeholder="Название курса" name="course_name" value="{{ old('course_name') }}">
        <input type="date" placeholder="date" name="date" value="{{ old('date') }}">
        <select name="payment" id="">
            <option value="cash">Наличными</option>
            <option value="transfit">Переводом по телефону</option>
        </select>
        <button>Создать</button>
    </form>


</main>
@endsection
