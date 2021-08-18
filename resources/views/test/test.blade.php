@extends('layout.app')
@section('title')
    Тесты
@endsection
@section('style')
    <link rel="preload" href="css/test.css" as="style">
    <link rel="stylesheet" href="css/test.css">
@endsection

@section('main')
    <main class="main container">
        <section class="test">
            <h1 class="title">Тесты</h1>
            <a class="button button--green button--margin" href="{{route('test-create-page')}}">Добавить тест</a>
        </section>
        <div class="card__block--question">
            @if ($tests && count($tests)>0)
                @foreach($tests as $item)
                <div class="card question__card">
                    <div class="test__title-wrapper">
                        <h2 class="card__title">{{$item->name}}</h2>
                        <h3 class="card__title">{{$item->topic}}</h3>
                    </div>
                    <a class="button main-button" href="{{route('test-single', ['id' => $item->id])}}">Подробнее</a>
                </div>
                @endforeach
            @else
                <h2 class="card__title">
                    Нет ни одного предмета
                </h2>
            @endif
        </div>
    </main>
@endsection
@section('js')
@endsection
