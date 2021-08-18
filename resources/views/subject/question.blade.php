@extends('layout.app')
@section('title')
    {{$topic->name}}
@endsection
@section('style')
    <link rel="preload" href="css/question.css" as="style">
    <link rel="stylesheet" href="css/question.css">
@endsection

@section('main')
    <main class="main container">
        <section class="question">
            <h1 class="title">Тема: {{$topic->name}}</h1>
            @if(session('success'))
                <p class="form__success"> {{session('success')}} </p>
            @elseif($errors && $errors->count())
                <p class="form__error"> {{$errors -> first()}} </p>
            @endif
            <div class="button__wrapper">
                <a class="button button--green button--margin" href="{{route('question-create-page', ['topic_id' => $topic->id, 'subject_id' =>$subject_id ])}}">Добавить вопрос</a>
                <a class="button button--red button--margin" href="#">Удалить тему</a>
            </div>
            <h2 class="subtitle">Вопросы</h2>
            @if ($question && count($question) > 0)
            <div class="card__block--question">
                @foreach($question as $item)
                    <div class="card question__card">
                        <h2 class="card__title">{{$item->name}}</h2>
                        <a class="button main-button" href="{{route('question-page-single', ['topic_id' => $topic->id, 'subject_id'=> $subject_id, 'question_id'=>$item->id])}}">Подробнее</a>
                    </div>
                @endforeach
            </div>
            @else
                <h2 class="card__title">
                    Нет ни одного вопроса
                </h2>
            @endif
        </section>

    </main>

@endsection
@section('js')

@endsection
