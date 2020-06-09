@extends('layouts.main')

@section('title', 'Блог')

@section('main')
    <div id="admin">
        <h3>Коментарии к статье - "{{ $nameArticle }}"</h3>
        <hr>
        <table class="table table-secondary">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Текст</th>
                <th scope="col">Создана</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->text }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td><a href="/admin/comment/delete/{{ $comment->id }}">удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $comments->links() }}
    </div>
@endsection
