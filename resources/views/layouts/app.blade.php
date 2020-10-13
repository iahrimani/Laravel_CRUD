<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('posts.index') }}">Magisk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Auth::check())
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Стена <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Мои желания</a>
                    </li>
                </ul>
            @endif
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.signout')  }}">Выйти</a>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.signup') }}">Зарегестрироваться</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.signin') }}">Войти</a></li>
                @endif
            </ul>
        </div>

    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(function () {
        $('.alert-danger').fadeOut(3000);
    })
</script>
</body>
</html>
