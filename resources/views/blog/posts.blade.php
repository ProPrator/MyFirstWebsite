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
        <div class="post">
            <div class="head">
                <img src="{{asset('images/my_photo.png')}}" alt="моё фото" height="300px">
                <h3>Статья</h3>
                <p>
                    Разнообразный и богатый опыт укрепление и развитие структуры представляет собой интересный эксперимент проверки
                    дальнейших направлений развития. Повседневная практика показывает, что постоянное информационно-пропагандистское
                </p>
            </div>
            <div class="foot">
                <i>29-05-2020</i>
                <a href="/post/1" role="button" class="btn btn-secondary active"> Читать пост </a>
            </div>
        </div>
        <hr>
        <div class="post">
            <div class="head">
                <img src="{{asset('images/my_photo.png')}}" alt="моё фото" height="300px">
                <h3>Статья</h3>
                <p>
                    Разнообразный и богатый опыт укрепление и развитие структуры представляет собой интересный эксперимент проверки
                    дальнейших направлений развития. Повседневная практика показывает, что постоянное информационно-пропагандистское
                </p>
            </div>
            <div class="foot">
                <i>29-05-2020</i>
                <a href="/post/1" role="button" class="btn btn-secondary active"> Читать пост </a>
            </div>
        </div>
        <hr>
        <div class="post">
            <div class="head">
                <img src="{{asset('images/my_photo.png')}}" alt="моё фото" height="300px">
                <h3>Статья</h3>
                <p>
                    Разнообразный и богатый опыт укрепление и развитие структуры представляет собой интересный эксперимент проверки
                    дальнейших направлений развития. Повседневная практика показывает, что постоянное информационно-пропагандистское
                </p>
            </div>
            <div class="foot">
                <i>29-05-2020</i>
                <a href="/post/1" role="button" class="btn btn-secondary active"> Читать пост </a>
            </div>
        </div>
        <hr>
    </div>


@endsection
