@extends('layouts.app')

@section('title', 'Редактрирование профиля' )

@section('content')

<div class="row">
	<div class="col-lg-4 mx-auto">
		@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(session()->get('success'))
		<div class="alert alert-success mt-3">
			{{ session()->get('success') }}
		</div>
		@endif
		<form method="POST" action="{{ route('profile.edit') }}">
			@csrf
			<div class="form-group">
				<label for="full_name">Ваше полное имя</label>
				<input name="full_name"
				type="text" value="{{ Request::old('full_name') ?: Auth::user()->full_name }}"
				class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
				id="full_name">
			</div>

			<div class="form-group">
				<label for="email">Ваш email</label>
				<input name="email"
				type="text" value="{{ Request::old('email') ?: Auth::user()->email }}"
				class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
				id="email">
			</div>

			<div class="form-group">
				<label for="age">Ваш возраст</label>
				<input name="age" 
				type="text" 
				value="{{ Request::old('age') ?: Auth::user()->age }}" 
				class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" 
				id="age">
			</div>
			<button type="submit" class="btn btn-secondary">Редактировать</button>
		</form>
	</div>
</div>

@endsection