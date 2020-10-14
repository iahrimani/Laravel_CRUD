@extends('layouts.app')

@section('title', 'Профиль пользователя' )

@section('content')
<h3>Профиль пользователя, {{ $id->username }}</h3>

@if($id->full_name)
<h4>Имя: {{ $id->full_name }}</h4>
@endif

@if($id->email)
<h4>E-mail: {{ $id->email }}</h4>
@endif

@if($id->age)
<h4>Возраст: {{ $id->age }}</h4>
@endif

@endsection
