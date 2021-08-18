@extends('layout.app')
@section('title')
    Факультеты
@endsection
@section('style')
    <link rel="preload" href="css/faculty.css" as="style">
    <link rel="stylesheet" href="css/faculty.css">
@endsection

@section('main')
    <main class="main container">
        <section class="question">
            <h1 class="title">Факультеты</h1>
            <a class="button button--green button--margin" href="#">Добавить</a>
            @if ($faculties && $faculties->count())
                <div class="card__block">
                    @foreach($faculties as $item)
                        <div class="card curator__card">
                            <h2 class="card__title">{{$item->name}}</h2>
                            <a class="button button--red" href="#">Удалить</a>
                        </div>
                    @endforeach
                </div>
            @else
                <h2 class="card__title">
                    Нет ни одного куратора
                </h2>
            @endif
        </section>

    </main>

@endsection
@section('js')

@endsection
