@extends('layout.app')
@section('title')
    {{$subject->name}}
@endsection
@section('style')
    <link rel="preload" href="css/topic.css" as="style">
    <link rel="stylesheet" href="css/topic.css">
@endsection

@section('main')
    <main class="main container">
        <section class="topic">
            <h1 class="title">Предмет: {{$subject->name}}</h1>

            <h2 class="subtitle">Темы</h2>
            @if ($topic && count($topic) > 0)
            <div class="card__block">
                @foreach($topic as $item)
                    <div class="card card--little">
                        <h2 class="card__title">{{$item->name}}</h2>
                        <a class="button main-button subject__button" href="{{route('subject-question', ['subject_id'=>$subject->id, 'topic_id'=>$item->id ])}}">Подробнее</a>
                    </div>
                @endforeach
            </div>
            @else
                <h2 class="card__title">
                    Нет ни одной темы
                </h2>
            @endif
        </section>

    </main>

@endsection
@section('js')

@endsection
