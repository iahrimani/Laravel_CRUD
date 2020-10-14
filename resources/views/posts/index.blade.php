@extends('layouts.app')

@section('title', 'Все задачи')

@section('content')

    <a href="{{route('posts.create')}}" class="btn btn-success">Добавить</a>
    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
        @else
        <div class="alert alert-danger mt-3">
        {{ session()->get('danger') }}
        </div>
    @endif
    <table class="table mt-4">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Задача</th>
            <th scope="col">Описание</th>
            <th scope="col">Автор</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ Str::limit($post->description, 70) }}</td>
                <td><a href="{{ route('profile.index', ['id' => $post->author->id]) }}">{{ $post->author->username }}</a></td>
            <td class="table-buttons">
                <a href="{{route('posts.show', $post)}}" class="btn btn-dark">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{route('posts.edit', $post)}}" class="btn btn-warning">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
{{ $posts->links() }}
@endsection
