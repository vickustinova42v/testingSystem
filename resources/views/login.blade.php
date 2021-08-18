@extends('layout.app')
    @section('title')
        Авторизация
    @endsection
    @section('style')
        <link rel="preload" href="css/login.css" as="style">
        <link rel="stylesheet" href="css/login.css">
    @endsection

    @section('main')
        <main class="main">
            <h1 class="title">Система тестирования<br>студентов</h1>
            <form class="form" method="get" action="{{route('login-auth')}}" id="loginForm">
                @csrf
                @if ($errors->has('email'))
                    <p class="form__error"> {{ $errors->first('email')}} </p>
                @elseif ($errors->has('password'))
                    <p class="form__error"> {{$errors->first('password')}} </p>
                @elseif($errors->has('status_id'))
                    <p class="form__error">{{ $errors->first('status_id') }} </p>
                @endif
                <label class="form__label" for="email">Введите email</label>
                <input class="form__input" name="email" id="email" type="email" required>
                <label class="form__label" for="password">Введите пароль</label>
                <input class="form__input" name="password" id="password" type="password" required>
                <button class="form__button" type="submit">Войти</button>
            </form>
        </main>
    @endsection
@section('js')
@endsection


