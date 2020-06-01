@extends('layouts.main')

@section('title', 'Блог')

@section('main')
    <div class="text">
        <div class="post">
            <h3>{{ $article->name }}</h3>
            <img src="{{ asset($article->image) }}" alt="Картинка">
            <p>
                {{ $article->text }}
            </p>
            <span id="date">Статья написана <i>{{ $article->created_at }}</i></span>
        </div>
        <br>
        @foreach($comments as $comment)
        <div class="comment">
            <h4>{{ $comment->user->name }}</h4>
            <p>
                {{ $comment->text }}
            </p>
            <hr>
        </div>
        @endforeach
    </div>
@endsection
