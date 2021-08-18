<header class="header">
    <div class="container header__wrapper">
        <button class="burger" type="button" id="burgerBut" aria-label="Открыть/закрыть меню">
            <span class="burger__line" id="lineStart"></span>
            <span class="burger__line" id="lineCenter"></span>
            <span class="burger__line" id="lineEnd"></span>
        </button>
        <nav class="nav" id="navMenu">
            <a class="nav__item" href="{{route('profile')}}">Профиль</a>
            @if(auth()->user()->getRole->name == 'student' || auth()->user()->getRole->name == 'teacher')
                <a class="nav__item" href="{{route('subject')}}">Предметы</a>
                <a class="nav__item" href="{{route('testing')}}">Тестирования</a>

            @endif
            @if(auth()->user()->getRole->name == 'teacher')
                <a class="nav__item" href="{{route('test')}}">Тесты</a>
                <a class="nav__item" href="{{route('group')}}">Группы</a>
            @endif
            @if(auth()->user()->getRole->name == 'admin')
                <a class="nav__item" href="{{route('curator')}}">Кураторы</a>
                <a class="nav__item" href="{{route('faculty')}}">Факультеты</a>
            @endif
            @if(auth()->user()->getRole->name == 'curator')
                <a class="nav__item" href="#">Группы</a>
                <a class="nav__item" href="#">Пользователи</a>
                <a class="nav__item" href="#">Запросы на подтверждение</a>
            @endif
        </nav>
        <a class="header__button" href="{{route('logout-auth')}}">
            Выйти
        </a>
    </div>
</header>
