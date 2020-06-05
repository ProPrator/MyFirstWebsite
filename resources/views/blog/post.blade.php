@extends('layouts.main')

@section('title', 'Блог')

@section('main')
    <div class="text text-blog">
        <div class="post">
            <h3>{{ $article->name }}</h3>
            <img src="{{ asset('/storage/' . $article->image) }}" alt="Картинка">
            <p>
                {{ $article->text }}
            </p>
            <span id="date">Статья написана <i>{{ $article->created_at }}</i></span>
        </div>
        <br>
        <div class="row">
            <div class="col-3"></div>
            <div class="col">
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
            <div class="col-3"></div>
        </div>
    </div>
@endsection
