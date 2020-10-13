@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="row">
        <div class="col-lg-4 mx-auto mt-4">
            <h3>Регистрация</h3>
            <form method="POST" action="{{ route('auth.signup') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" id="email"
                           placeholder="Например, user@xyz.com"
                           value="{{ Request::old('email') ?: '' }}">

                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
					{{ $errors->first('email') }}
				</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="username">Логин</label>
                    <input type="text" name="username"
                           class="form-control{{ $errors->has('username') ? ' is-invalid' : ''}}"
                           id="username"
                           placeholder="Введите Nickname"
                           value="{{ Request::old('username') ?: '' }}">

                    @if ($errors->has('username'))
                        <span class="help-block text-danger">
					{{ $errors->first('username') }}
				</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password"
                           name="password"
                           placeholder="Минимум 6 символов	"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : ''}}"
                           id="password">
                    @if ($errors->has('password'))
                        <span class="help-block text-danger">
					{{ $errors->first('password') }}
				</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Введите пароль ещё раз</label>
                    <input type="password" name="password_confirmation"
                           placeholder="Минимум 6 символов	"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : ''}}"
                           id="password">
                    @if ($errors->has('password'))
                        <span class="help-block text-danger">
					{{ $errors->first('password') }}
				</span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary mt-2">
                        Создать аккаунт
                </button>
            </form>
        </div>
    </div>

@endsection
