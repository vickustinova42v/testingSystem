@extends('layout.app')
@section('title')
    Создание вопроса
@endsection
@section('style')
    <link rel="preload" href="css/question-add.css" as="style">
    <link rel="stylesheet" href="css/question-add.css">
@endsection

@section('main')
    <main class="main container">
        <section class="question">
            <h1 class="title">Создание вопроса</h1>
            <form method="post" class="form" action="{{route('question-create')}}" id="formAddQuestion">
                @csrf
                @if(session('success'))
                    <p class="form__success"> {{session('success')}} </p>
                @elseif($errors && $errors->count())
                    <p class="form__error"> {{$errors -> first()}} </p>
                @endif
                <input type="text" name="topic_id" value="{{$topic_id}}" hidden>
                <input type="text" name="count_of_answers" id="countOfAnswers" hidden>
                <label class="form__label" for="textAreaAddQuestion">Введите вопрос</label>
                <textarea class="form__input form__textarea" name="question_text" id="textAreaAddQuestion" required></textarea>
                <label class="form__label" for="selectTypeOfQuestion">Выберете тип вопроса</label>
                <select class="form__input" name="type_of_question" id="selectTypeOfQuestion" required>
                    <option value="single">Один правильный ответ</option>
                    <option value="multiple">Несколько правильных ответов</option>
                    <option value="insertion">Написать решение</option>
                </select>
                <button type="button" class="button button-long button--green button--margin" id="btnAddVariantOfQuestion">Добавить вариант ответа</button>
                <div class="question__variants-list" id="variantsOfQuestionList"></div>
            </form>
        </section>
    </main>

@endsection
@section('js')
    <link rel="preload" href="js/add-variant.js" as="script">
    <script src="js/add-variant.js"></script>
@endsection
