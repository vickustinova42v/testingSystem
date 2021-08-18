@extends('layout.app')
@section('title')
        Изменить пароль
@endsection
@section('style')
    <link rel="preload" href="css/change.css" as="style">
    <link rel="stylesheet" href="css/change.css">
@endsection

@section('main')
    <main class="main container">
        <section class="change-password">
            <h1 class="title">Изменить пароль</h1>
            <form class="form form__change-password" method="post" action="{{route('change-password-change')}}" id="changePasswordForm">
            @if($errors && $errors->count())
                <p class="form__error"> {{$errors -> first()}} </p>
            @elseif(session('success'))
                <p class="form__success"> {{session('success')}} </p>
            @endif
            @csrf
                <label class="form__label" for="current_password">
                    Введите текущий пароль
                </label>
                <input class="form__input form__input--change-password" name="current_password" id="current_password" type="password" required>
                <label class="form__label" for="new_password">
                    Введите новый пароль
                </label>
                <input class="form__input form__input--change-password" name="new_password" id="new_password" type="password" required minlength="8" maxlength="16">
                <label class="form__label" for="new_password_confirmation">
                    Повторите пароль
                </label>
                <input class="form__input form__input--change-password" name="new_password_confirmation" id=new_password_confirmation" type="password" required minlength="8" maxlength="16">
                <button class="form__button form__button--change-password" type="submit">Изменить</button>
            </form>
        </section>
    </main>
@endsection
@section('js')
@endsection
