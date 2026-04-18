@extends('layout')

@section('content')
<main class="container mx-auto px-5">
    <h1 class="text-center font-bold text-3xl my-5">Админ-панель</h1>
    <table class="w-full text-center">
        <thead>
            <tr>
                <th class="border border-gray-500">№ заявки</th>
                <th class="border border-gray-500">Логин</th>
                <th class="border border-gray-500">Почта</th>
                <th class="border border-gray-500">Телефон</th>
                <th class="border border-gray-500">Название курса</th>
                <th class="border border-gray-500">Дата</th>
                <th class="border border-gray-500">Способ оплаты</th>
                <th class="border border-gray-500">Изменить статус</th>
                <th class="border border-gray-500">Отзыв</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apps as $app)
            <tr>
                <td class="border border-gray-500">{{ $app->id }}</td>
                <td class="border border-gray-500">{{ $app->user->login }}</td>
                <td class="border border-gray-500">{{ $app->user->email }}</td>
                <td class="border border-gray-500">{{ $app->user->phone }}</td>
                <td class="border border-gray-500">{{ $app->course_name }}</td>
                <td class="border border-gray-500">{{ $app->date }}</td>
                <td class="border border-gray-500">{{ $app->payment }}</td>
                <td class="border border-gray-500">
                    @if($app->status !== 'end')
                    <form action="{{ route('admin.post', $app->id) }}" method="POST">
                        @csrf
                        <select name="status" id="">
                            <option value="new" @selected($app->status == 'new')>Новая</option>
                            <option value="continue" @selected($app->status == 'continue')>Идет обучение</option>
                            <option value="end">Обучение завершено</option>
                        </select>
                        <button>Изменить</button>
                    </form>
                    @else
                    Обучение завершено
                    @endif
                </td>
                <td class="border border-gray-500">{{ $app->review }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
