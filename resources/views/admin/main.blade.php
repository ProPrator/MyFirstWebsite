@extends('layouts.main')

@section('title', 'Блог')

@section('main')
    <div id="admin">
        <div class="alert alert-{{ $status }}" role="alert">
            {{ $message }}
        </div>
        <a class="btn btn-secondary" href="#" role="button">Написать статью</a>
        <hr>
        <table class="table table-secondary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название статьи</th>
                    <th scope="col">Создана</th>
                    <th scope="col">Последнее редактирование</th>
                    <th scope="col">Редактировать</th>
                    <th scope="col">Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td><a href="/admin/{{ $article->id }}">{{ $article->name }}</a></td>
                        <td>{{ $article->created_at }}</td>
                        <td>{{ $article->updated_at }}</td>
                        <td><a href="article/edit/{{ $article->id }}">редактировать</a></td>
                        <td><a href="article/deleted/{{ $article->id }}">удалить</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
