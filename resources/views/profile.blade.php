@extends('layout.app')
@section('title')
    Профиль
@endsection
@section('style')
    <link rel="preload" href="css/profile.css" as="style">
    <link rel="stylesheet" href="css/profile.css">
@endsection

@section('main')
    <main class="main container">
        <h1 class="visually-hidden" class="visually-hidden" aria-hidden="true" tabindex="-1">Профиль пользователя</h1>
        <section class="user">
            <h2 class="title">Информация</h2>
            <ul class="user__info">
                <li class="user__item">
                    <h3 class="user__subtitle">ФИО</h3>
                    <p class="user__text">{{ auth()->user()->fio }}</p>
                </li>
                <li class="user__item">
                    <h3 class="user__subtitle">Роль</h3>
                    <p class="user__text">{{ auth()->user()->getRole->rus_name }}</p>
                </li>
                <li class="user__item">
                    <h3 class="user__subtitle">Электронная почта</h3>
                    <p class="user__text">{{ auth()->user()->email }}</p>
                </li>
            @if(auth()->user()->getRole->name != 'admin')
                <li class="user__item">
                    <h3 class="user__subtitle">Факультет</h3>
                    <p class="user__text">{{ auth()->user()->getFaculty->name }}</p>
                </li>
            @endif
            @if(auth()->user()->getRole->name == 'student')
                <li class="user__item">
                    <h3 class="user__subtitle">Группа</h3>
                    <p class="user__text">{{ auth()->user()->getGroup->name }}</p>
                </li>
                <li class="user__item">
                    <h3 class="user__subtitle">Год поступления</h3>
                    <p class="user__text">{{ auth()->user()->year_of_admission }}</p>
                </li>
                <li class="user__item">
                    <h3 class="user__subtitle">Номер зачетной книжки</h3>
                    <p class="user__text">{{ auth()->user()->number_of_student }}</p>
                </li>
            @endif
            </ul>
            <div class="button__wrapper">
                <a class="button main-button" href="{{route('change-password')}}">Изменить пароль</a>
                @if(auth()->user()->getRole->name == 'admin')
                    <a class="button main-button" href="{{route('change-profile')}}">Изменить данные</a>
                @endif
            </div>
        </section>
    </main>
@endsection
@section('js')
@endsection
