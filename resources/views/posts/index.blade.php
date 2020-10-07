@extends('layouts.app')

@section('title', 'Все желания')

@section('content')

    <a href="{{route('posts.create')}}" class="btn btn-success">Создать желание</a>
    @if(session()->get('success'))
        <div class="alert alert-danger mt-3">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table mt-4">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Желание</th>
            <th scope="col">Описание</th>
            <th scope="col">Автор</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ Str::limit($post->description, 70) }}</td>
            <td>{{ $post->author }}</td>
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
