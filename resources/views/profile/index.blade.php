@extends('layouts.app')

@section('title', 'Профиль пользователя' )

@section('content')
<h3>Профиль пользователя</h3>

{{ $id->username }}
{{ $id->email }}

@endsection
