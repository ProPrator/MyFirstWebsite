@extends('layouts.main')

@section('title', 'Блог')

@section('main')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h2 class="display-6">Это мой блог</h2>
            <p class="lead">
                В этом блоге я делюсь своей жизнью. Рассказываю о своих путешествиях, обучении, саморазвитии и просто
                об интересных для меня вещах.
            </p>
        </div>
    </div>
    <div class="text">
        @foreach($articles as $article)
            <div class="post">
                <div class="head">
                    <img src="{{ asset($article->image) }}" alt="моё фото" height="300px">
                    <h3>{{ $article->name }}</h3>
                    <p>
                        {{ $article->description }}
                    </p>
                </div>
                <div class="foot">
                    <i>{{ $article->created_at }}</i>
                    <a href="/post/{{ $article->id }}" role="button" class="btn btn-secondary active"> Читать пост </a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
