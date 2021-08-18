@extends('layout.app')
@section('title')
    Создание теста
@endsection
@section('style')
    <link rel="preload" href="css/test-add.css" as="style">
    <link rel="stylesheet" href="css/test-add.css">
@endsection

@section('main')
    <main class="main container">
        <section class="test">
            <h1 class="title">Создание теста</h1>
            <form method="post" class="form" action="{{route('test-create')}}" id="formAddTopics">
                @csrf
                @if(session('success'))
                    <p class="form__success"> {{session('success')}} </p>
                @elseif($errors && $errors->count())
                    <p class="form__error"> {{$errors -> first()}} </p>
                @endif
                <input type="text" id="amountOfTopics" name="amount_оf_topics" hidden>
                <label class="form__label" for="nameOfTest">Введите название теста</label>
                <input type="text" class="form__input" name="test_text" id="nameOfTest" required/>
                <div class="form__wrapper">
                    <div class="test__question-wrapper">
                        <label class="form__label" for="amountOfVariants" >Введите количество вариантов</label>
                        <input type="number" class="form__input form__test-number-input" name="amount_of_variants" id="amountOfVariants" required/>
                    </div>
                    <div class="test__question-wrapper">
                        <label class="form__label" for="amountOfQuestions">Введите количество вопросов в варианте</label>
                        <input type="number" class="form__input form__test-number-input" name="amount_of_questions" id="amountOfQuestions" required/>
                    </div>
                </div>
                <label class="form__label" for="subjects">Выберете предмет</label>
                <select class="form__input" name="subjects" id="subjects" required>
                    @foreach($subjects as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <div id="topics"></div>
            </form>
        </section>
    </main>
@endsection
@section('js')
    <link rel="preload" href="js/add-topic.js" as="script">
    <script src="js/add-topic.js"></script>
@endsection
