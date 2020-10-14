@extends('layouts.app')

@section('title', $post->title )

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->description }}</p>
            <a href="{{ route('profile.index', ['id' => $post->author->id]) }}"><p class="font-weight-normal">{{ $post->author->username }}</p></a>
        </div>
    </div>
@endsection
