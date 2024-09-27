@php use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Route; @endphp
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">БлоХ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() === 'index') active @endif" aria-current="page"
                       href="{{ route('index') }}">Главная</a>
                </li>
                <li class="nav-item">
                    @guest()
                        <a class="nav-link @if(Route::currentRouteName() === 'register.index') active @endif"
                           href="{{ route('register.index') }}">Регистрация</a>
                    @endguest
                </li>
                <li class="nav-item">
                    @guest()
                        <a class="nav-link @if(Route::currentRouteName() === 'auth.index') active @endif"
                           href="{{ route('auth.index') }}">Авторизация</a>
                    @endguest
                </li>
                @auth()
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'categories.index') active @endif"
                               href="{{ route('categories.index') }}">Категории</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'posts.moderation') active @endif"
                               href="{{ route('posts.moderation') }}">Посты на модерацию</a>
                        </li>
                    @endif
                @endauth
            </ul>
            @auth()
                <div class="fw-bold">
                    <a href="{{ route('') }}"></a>{{ Auth::user()->fio }}
                </div>
            @endauth
        </div>
    </div>
</nav>
