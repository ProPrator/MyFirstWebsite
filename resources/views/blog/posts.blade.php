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
                    <img src="{{ asset('/storage/' . $article->image) }}" alt="моё фото" height="300px">
                    <h3>{{ $article->name }}</h3>
                    <p>
                        {{ $article->description }}
                    </p>
                </div>
                <div class="foot">
                    <i>{{ $article->created_at }}</i>
                    <div class="post-button">
                        <form action="/article/{{ $article->id }}">
                            <input type="submit" class="btn btn-secondary btn-lg active" value="Читать пост">
                        </form>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
        {{ $articles->links() }}
    </div>
@endsection
