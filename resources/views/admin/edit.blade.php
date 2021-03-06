@extends('layouts.main')

@section('title', 'Блог')

@section('main')
    <div id="admin">
        <h3>Здесь вы можете отредактировать свою статью</h3>
        @if(count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>
                            {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
        <form action="/article/edit/{{ $article->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Название статьи</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" value="{{ $article->name }}">
            </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Описание</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="description" value="{{ $article->description }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Картинка статьи</label>
                <div class="col-sm-10">
                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <img class="edit-img" src="{{ asset('/storage/' . $article->image) }}" alt="картинка">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Текст статьи</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="text">{{ $article->text }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary btn-lg btn-block">Внести изменения в статью</button>
        </form>
    </div>
@endsection
