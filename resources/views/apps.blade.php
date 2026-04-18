@extends('layout')

@section('content')
<main class="container mx-auto px-5">
    <h1>Страница ваших заявок!</h1>
    <article class="grid grid-cols-6">
        @forelse($apps as $app)
        <article class="flex flex-col gap-1 p-5 border">
            <h2 class="font-bold">{{ $app->course_name }}</h2>
            <p>{{ $app->date }}</p>
            <b>{{ $app->status }}</b>
            <form action="{{ route('apps.review', $app->id) }}" method="POST">
                @csrf
                <textarea name="review" id="" placeholder="Введите отзыв"></textarea>
                <button>Отправить</button>
            </form>
        </article>
        @empty
        <p>У вас нет заявок!</p>
        @endforelse
    </article>
</main>
@endsection
