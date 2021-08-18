@extends('layout.app')
@section('title')
    Предметы
@endsection
@section('style')
    <link rel="preload" href="css/subject.css" as="style">
    <link rel="stylesheet" href="css/subject.css">
@endsection

@section('main')
<main class="main container">
    <section class="subject">
        <h1 class="title">Предметы</h1>
        @if(Auth::user()->getRole->name == 'teacher')
        <a class="button button--green button--margin" href="{{route('create-curator-page')}}">Добавить</a>
        @endif
        @if ($subject && count($subject) > 0)
        <div class="card__block">
            @foreach($subject as $item)
                <div class="card card--little">
                    <h2 class="card__title">{{$item->name}}</h2>
                @if(Auth::user()->getRole->name == 'student')
                    <p class="card__text">{{$item->fio}}</p>
                @elseif(Auth::user()->getRole->name == 'teacher')
                    <a class="button main-button subject__button" href="{{route('subject-topic', ['id' => $item->id])}}">Подробнее</a>
                @endif
                </div>
            @endforeach
        </div>
        @else
            <h2 class="card__title">
                Нет ни одного предмета
            </h2>
        @endif
    </section>

</main>

@endsection
@section('js')

@endsection
