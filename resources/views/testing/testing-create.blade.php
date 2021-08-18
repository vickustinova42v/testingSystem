@extends('layout.app')
@section('title')
    Создание тестирования
@endsection
@section('style')
    <link rel="preload" href="css/testing-add.css" as="style">
    <link rel="stylesheet" href="css/testing-add.css">
@endsection

@section('main')
    <main class="main container">
        <section class="test">
            <h1 class="title">Создание тестирования</h1>
            <form method="post" class="form" action="{{route('testing-create')}}">
                @csrf
                @if(session('success'))
                    <p class="form__success"> {{session('success')}} </p>
                @elseif($errors && $errors->count())
                    <p class="form__error"> {{$errors -> first()}} </p>
                @endif
                <div class="form__wrapper">
                    <div class="form__input-wrapper">
                        <label class="form__label" for="">Введите дату начала теста</label>
                        <input type="datetime-local" class="form__input" name="test_text" id="" required/>
                    </div>
                    <div class="form__input-wrapper">
                        <label class="form__label" for="">Введите дату окончания теста</label>
                        <input type="datetime-local" class="form__input" name="test_text" id="" required/>
                    </div>
                </div>
                <div class="form__wrapper">
                    <div class="form__input-wrapper">
                        <label class="form__label" for="" >Введите время на тест</label>
                        <input type="time" class="form__input" name="test_text" id="" required/>
                    </div>
                    <div class="form__input-wrapper form__input-wrapper--checkbox">
                        <input class="form__checkbox" type="checkbox" id="" required/>
                        <label class="form__label" for="">Показать результат сразу после тестирования</label>
                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection
@section('js')
@endsection
