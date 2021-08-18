@extends('layout.app')
@section('title')
    Добавить куратора
@endsection
@section('style')
    <link rel="preload" href="css/curator-add.css" as="style">
    <link rel="stylesheet" href="css/curator-add.css">
@endsection

@section('main')
    <main class="main container">
        <section class="curator-add">
            <h1 class="title">Добавить куратора</h1>
            <form class="form form__add" method="post" action="{{route('create-curator')}}" id="changePasswordForm">
                @csrf
                @if(session('success'))
                    <p class="form__success"> {{session('success')}} </p>
                @elseif($errors && $errors->count())
                    <p class="form__error"> {{$errors -> first()}} </p>
                @endif
                <label class="form__label" for="user_fio">
                    Введите ФИО
                </label>
                <input class="form__input" name="user_fio" id="user_fio" type="text" required minlength="15" maxlength="100">
                <label class="form__label" for="user_email">
                    Введите Email
                </label>
                <input class="form__input" name="user_email" id="user_email" type="text" required>
                <label class="form__label" for="user_email">
                    Выберете факультет
                </label>
                <select class="form__input" name="user_faculty" required>
                    @if($faculty && $faculty->count())
                        @foreach($faculty as $faculty)
                            <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                        @endforeach
                    @endif
                </select>
                <button class="form__button" type="submit">Добавить</button>
            </form>
        </section>
    </main>
@endsection
@section('js')
@endsection
