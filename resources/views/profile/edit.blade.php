@extends('layouts.app')

@section('title', 'Редактрирование профиля' )

@section('content')

<div class="row">
        <div class="col-lg-6 mx-auto">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('profile.edit') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Ваш Никнейм</label>
                    <input name="username" type="text" value="" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username">
                </div>

                <div class="form-group">
                    <label for="full_name">Ваше полное имя</label>
                    <input name="full_name" type="text" value="" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="full_name">
                </div>

                <div class="form-group">
                    <label for="email">Ваш email</label>
                    <input name="email" type="text" value="" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="email">
                </div>

                <div class="form-group">
                    <label for="age">Ваш возраст</label>
                    <input name="age" type="text" value="" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="age">
                </div>
                <button type="submit" class="btn btn-secondary">Редактировать</button>
            </form>
        </div>
    </div>

@endsection