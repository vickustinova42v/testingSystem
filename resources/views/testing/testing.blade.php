@extends('layout.app')
@section('title')
    Тестирования
@endsection
@section('style')
    <link rel="preload" href="css/testing.css" as="style">
    <link rel="stylesheet" href="css/testing.css">
@endsection

@section('main')
    <main class="main container">
        <article class="test">
            <h1 class="title">Тестирования</h1>
            @if(auth()->user()->getRole->name == 'teacher')
                <a class="button main-button button--green" href="{{route('testing-create-page')}}">Добавить</a>
            @endif
            <section class="test">
                <h2 class="title">Назначенные тестирования</h2>
                <h3 class="test__subtitle">Нет ни одного назначенного теста</h3>
            </section>
            <section class="test">
                <h2 class="title">Пройденные тестирования</h2>
                <h3 class="test__subtitle">Нет ни одного пройденного теста</h3>
            </section>
        </article>
    </main>
@endsection
@section('js')
@endsection
