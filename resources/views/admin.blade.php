@extends('layout')

@section('title')
@endsection

@section('content')
<main class="container mx-auto px-5">
    @session('success')
    <article>
        {{ session('success') }}
    </article>
    @endsession
    <h1 class="text-4xl text-center font-bold my-5">Админ-панель</h1>
    <article>
        @if($apps->isNotEmpty())
        <table class="w-full text-center">
            <thead>
                <tr>
                    <th>№ заявки</th>
                    <th>Логин</th>
                    <th>Телефон</th>
                    <th>Почта</th>
                    <th>Название курса</th>
                    <th>Дата</th>
                    <th>Оплата</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apps as $app)
                <tr>
                    <td>{{ $app->id }}</td>
                    <td>{{ $app->user->login }}</td>
                    <td>{{ $app->user->phone }}</td>
                    <td>{{ $app->user->email }}</td>
                    <td>{{ $app->course_name }}</td>
                    <td>{{ $app->date }}</td>
                    <td>{{ $app->payment == 'cash' ? 'Наличными' : 'переводом по номеру телефона' }}</td>
                    <td>
                        @if($app->status != 'end')
                        <form action="{{ route('admin-store', $app->id) }}">
                            @csrf
                            <select name="status" id="">
                                <option value="new" @selected($app->status == 'new')>Новая</option>
                                <option value="continue" @selected($app->status == 'continue')>Идет обучение</option>
                                <option value="end" @selected($app->status == 'end')>Обучение завершено</option>
                            </select>
                            <button>Применить</button>
                        </form>
                        @else
                        Обучение завершено
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Еще никто не отправлял заявку на обучение!</p>
        @endif
    </article>
</main>
@endsection
