@extends('layout')

@section('title')
Заявки
@endsection

@section('content')
<main>
    <h1>Ваши заявки:</h1>
    @if($applications->isNotEmpty())
    <ul>
        @foreach($applications as $application)
        <li>
            <p>Курс "{{ $application->course_name }}"</p>
            <p>Дата: {{ $application->date }}</p>
            <p>Статус заявки: <b>{{ $application->status }}</b></p>
        </li>
        @endforeach
    </ul>

    @else
    <p>У вас нет никаких заявок! Хотите <a href="{{ route('create-apps') }}">создать?</a></p>
    @endif
</main>
@endsection
