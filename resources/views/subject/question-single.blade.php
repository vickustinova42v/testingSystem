@extends('layout.app')
@section('title')
    Вопрос #{{$question_id}}
@endsection
@section('style')
    <link rel="preload" href="css/question-add.css" as="style">
    <link rel="stylesheet" href="css/question-add.css">
@endsection

@section('main')
    <main class="main container">
        <section class="question">
            <h1 class="title">Вопрос #{{$question_id}}</h1>
            <a class="button button--red button-long button--margin" href="{{route('question-delete', ['id' => $question_id, 'subject_id' => $subject_id, 'topic_id' => $topic_id])}}">Удалить вопрос</a>
            <form method="post" class="form" action="{{route('question-update')}}" id="formAddQuestion">
                @csrf
                @if(session('success'))
                    <p class="form__success"> {{session('success')}} </p>
                @elseif($errors && $errors->count())
                    <p class="form__error"> {{$errors -> first()}} </p>
                @endif
                <input type="text" name="topic_id" value="{{$topic_id}}" hidden>
                <input type="text" name="count_of_answers" id="countOfAnswers" @if($variants && count($variants)) value="{{count($variants)}}" @endif hidden>
                <label class="form__label" for="textAreaAddQuestion">Вопрос</label>
                <textarea class="form__input form__textarea" name="question_text" id="textAreaAddQuestion" required>{{$question->name}}</textarea>
                <label class="form__label" for="selectTypeOfQuestion">Тип вопроса</label>
                <select class="form__input" name="type_of_question" id="selectTypeOfQuestion" required>
                    <option value="single" @if($question->type_id == 1) selected @endif>Один правильный ответ</option>
                    <option value="multiple" @if($question->type_id == 2) selected @endif>Несколько правильных ответов</option>
                    <option value="insertion" @if($question->type_id == 3) selected @endif>Написать решение</option>
                </select>
                <button type="button" class="button button-long button--green button--margin" id="btnAddVariantOfQuestion">Добавить вариант ответа</button>
                @if($variants && count($variants))
                    <div class="question__variants-list" id="variantsOfQuestionList">
                        @foreach($variants as $item)
                            <div class="form__wrapper">
                                <input type="checkbox" class="form__checkbox" name="rightVariantOfAnswer-{{$item->id}}" @if($item->right_answer==1) checked @endif>
                                <input type="text" name="variantOfAnswer-{{$item->id}}" required class="form__input question__input" value="{{$item->name}}">
                                <button type="button" class="button button--red button__delete">Удалить</button>
                            </div>
                        @endforeach
                    </div>
                    <button class="form__button form__submit" type="submit">Сохранить</button>
                @else
                    <div class="question__variants-list" id="variantsOfQuestionList">
                    </div>
                @endif
            </form>
        </section>
    </main>

@endsection
@section('js')
    <link rel="preload" href="js/add-variant.js" as="script">
    <script src="js/add-variant.js"></script>
@endsection
