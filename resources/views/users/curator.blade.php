@extends('layout.app')
@section('title')
    Кураторы
@endsection
@section('style')
    <link rel="preload" href="css/curator.css" as="style">
    <link rel="stylesheet" href="css/curator.css">
@endsection

@section('main')
    <main class="main container">
        <section class="curator">
            <h1 class="title">Кураторы</h1>
            <a class="button button--green button--margin" href="{{route('create-curator-page')}}">Добавить</a>
            @if ($curators && count($curators))
                <div class="card__block">
                    @foreach($curators as $item)
                        <div class="card curator__card">
                            <h2 class="card__title">{{$item->fio}} - {{$item->name}}</h2>
                            <a class="button main-button curator__button" href="#">Подробнее</a>
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
