@extends('layouts.app')

@section('title', 'Войти на сайт')

@section('content')
    <div class="row">
        <div class="col-lg-4 mx-auto">
            <h3>Войти на сайт</h3>
            <form method="POST" action="{{ route('auth.signin') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" id="email"
                           placeholder="Например, xyz@gmail.com"
                           value="{{ Request::old('email') ?: '' }}">

                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
					{{ $errors->first('email') }}
				</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password"
                           placeholder="Минимум 6 символов	"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : ''}}"
                           id="password">
                    @if ($errors->has('password'))
                        <span class="help-block text-danger">
					{{ $errors->first('password') }}
				</span>
                    @endif
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input name="remember" type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label" for="remember">Запомнить меня</label>
                </div>
                <button type="submit"
                        class="btn btn-dark mt-2">
                    Войти
                </button>
                <div class="form-row mx-auto mt-2">
                    <a href="{{ route('github') }}" 
                    class="btn btn-dark">
                        Войти через Git
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

