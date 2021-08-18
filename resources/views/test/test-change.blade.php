@extends('layout.app')
@section('title')
    Тест {{$test->topic}}
@endsection
@section('style')
    <link rel="preload" href="css/test-add.css" as="style">
    <link rel="stylesheet" href="css/test-add.css">
@endsection

@section('main')
    <main class="main container">
        <section class="test">
            <h1 class="title">Тест #{{$test->id}}</h1>
            <a class="button button--red button-long button--margin" href="#">Удалить тест</a>
            <form method="post" class="form" action="#" id="formAddTopics">
                @csrf
                @if(session('success'))
                    <p class="form__success"> {{session('success')}} </p>
                @elseif($errors && $errors->count())
                    <p class="form__error"> {{$errors -> first()}} </p>
                @endif
                @foreach($topics as $topic)
                    <input type="text" class="topicsOfQuestions" value="{{$topic->topics_id}}" hidden>
                @endforeach
                <input type="text" id="amountOfTopics" name="amount_оf_topics" hidden>
                <label class="form__label" for="nameOfTest">Название теста</label>
                <input type="text" class="form__input" name="test_text" id="nameOfTest" required value="{{$test->topic}}"/>
                <div class="form__wrapper">
                    <div class="test__question-wrapper">
                        <label class="form__label" for="amountOfVariants" >Количество вариантов</label>
                        <input type="number" class="form__input form__test-number-input" name="amount_of_variants" id="amountOfVariants" required value="{{$test->amount_of_variants}}"/>
                    </div>
                    <div class="test__question-wrapper">
                        <label class="form__label" for="amountOfQuestions">Количество вопросов в варианте</label>
                        <input type="number" class="form__input form__test-number-input" name="amount_of_questions" id="amountOfQuestions" required value="{{$test->amount_of_questions}}"/>
                    </div>
                </div>
                <label class="form__label" for="subjects">Предмет</label>
                <select class="form__input" name="subjects" id="subjects" required>
                    @foreach($subjects as $item)
                        <option value="{{$item->id}}" @if($item->id === $test->subject_id) selected @endif>{{$item->name}}</option>
                    @endforeach
                </select>
                <div id="topics"></div>
            </form>
            @foreach($variants as $variant)
                <details class="variants">
                    <summary class="variants__title">Вариант - {{$variant->number_of_test}}</summary>
                    <button type="button" class="button button--green button--margin button--print-test">Распечатать</button>
                    @foreach($questions as $question)
                        @if($question->variant_id === $variant->id)
                            <h2 class="test__question">{{$question->name}}</h2>
                            @if($question->type_id === 3)
                                <div class="test__variants-block">
                                    <input type="text" class="form__input test__input" disabled="disabled">
                                </div>
                            @else
                                <div class="test__variants-block">
                                    @foreach($variants_of_answers as $variant_of_answer)
                                        @if($variant_of_answer->question_id === $question->id)
                                            <div class="test__variants-wrapper">
                                                <input @if($question->type_id === 1) type="radio" @elseif($question->type_id === 2) type="checkbox" @else type="checkbox" hidden @endif id="variant_of_answer-{{$variant_of_answer->id}}" disabled="disabled">
                                                <label class="test__label" for="variant_of_answer-{{$variant_of_answer->id}}">{{$variant_of_answer->name}}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    @endforeach
                </details>
            @endforeach
        </section>
    </main>
@endsection
@section('js')
    <link rel="preload" href="js/add-topic.js" as="script">
    <script src="js/add-topic.js"></script>
    <link rel="preload" href="js/print-test.js" as="script">
    <script src="js/print-test.js"></script>
@endsection
