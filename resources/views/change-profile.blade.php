@extends('layout.app')
@section('title')
    Изменить данные
@endsection
@section('style')
    <link rel="preload" href="css/change.css" as="style">
    <link rel="stylesheet" href="css/change.css">
@endsection

@section('main')
    <main class="main container">
        <section class="change-password">
            <h1 class="title">Изменить данные</h1>
            <form class="form form__change-password" method="post" action="{{route('change-profile-change')}}" id="changePasswordForm">
                @csrf
                @if(session('success'))
                    <p class="form__success"> {{session('success')}} </p>
                @elseif($errors && $errors->count())
                    <p class="form__error"> {{$errors -> first()}} </p>
                @endif
                <input class="form__input form__input--change-password" name="user_fio" id="user_fio" type="text" placeholder="Введите ФИО" required value="{{$user->fio}}">
                <input class="form__input form__input--change-password" name="user_email" id="user_email" type="email" placeholder="Введите почту" required value="{{$user->email}}">
                <button class="form__button form__button--change-password" type="submit">Изменить</button>
            </form>
        </section>
    </main>
@endsection
@section('js')
@endsection
