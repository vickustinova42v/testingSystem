<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=6.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Система тестирования студентов - инструмент необходимый для каждого вуза">
    <meta name="keywords" content="тестирование студентов, тесты для студентов, экзамен, тестирование универ, тестирование вуз">
    <title>Система тестирования студентов - @yield('title')</title>
    <base href="{{config('app.url')}}">
    <link rel="preload" href="js/burger.js" as="script">
    @yield('style')

</head>
<body>
    @yield('layout.header')

    @if (Route::currentRouteName() != 'login' )
        @include('layout.header')
    @endif

    @yield('main')

    @yield('footer')
        @include('layout.footer')

    @yield('js')
    <script src="js/burger.js"></script>
</body>
</html>
