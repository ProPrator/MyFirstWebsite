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
    </div>
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
            {{ $comments->links() }}
        </div>
        <div class="col-3"></div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm">
            @if ($showForm)
                @if(count($errors) > 0)
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            <h3 class="comment-title">Оставте отзыв</h3>
            <form action="/comment/add/{{ $article->id }}" method="post">
                @csrf
                <textarea class="form-control comment-input" name="text"></textarea>
                <button type="submit" class="btn btn-secondary btn-lg btn-block">Добавить отзыв</button>
            </form>
            @else
                <h3 class="comment-title">Чтобы оставить отзыв - зарегистрируйтесь</h3>
            @endif
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
