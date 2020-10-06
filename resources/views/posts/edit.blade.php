@extends('layouts.app')

@section('title', 'Изменить желание')

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
            <form method="POST" action="{{ route('posts.update', $post) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Чего желаете ?</label>
                    <input name="title" type="text" value="{{ $post->title }}" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="post-description">Описание</label>
                    <textarea name="description" class="form-control" id="post-description" rows="5">{{ $post->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-secondary">Изменить</button>
            </form>
        </div>
    </div>

@endsection
