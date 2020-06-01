@extends('layouts.main')

@section('title', 'Главная страница')

@section('main')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-6">Здраствуйте это сайт Шнайдера Ивана</h1>
            <p class="lead">
                Это сайт резюме в котором я расскажу немного о себе, а начну я рассказ с того, что
                расскажу вам о своих двух пристрастиях, первое - это путешествия, а вторая - это жажда знаний.
            </p>
        </div>
    </div>
    <div class="text">
        <img id="myPhoto" src="{{ asset('images/my_photo.png') }}" alt="моё фото" height="300px">
        <p>
            Родился я в Крыму и там же проживал до 2007 года , в котором поступил в Одесскую государственную академию холода
            на кафедру информационных технологий по специальности информациоонно управляющие системы и технологии.
            В 2012 году успешно закончил обучение и устроился на работу не по специальности. Проработав на разных работах
            несколько лет я понял , что они не сильно интересны и не удовлетворяют мою жажду знаний и в 2019 году начал изучать веб программирование.
        </p>
        <img id="academy" src="{{ asset('images/my_diplom.png') }}" alt="">
        <p>
            В академии я изучал в оснвновном базу в сфере IT, многое из которой было не так уж и интересно и не представлялось
            где это можно применить. Но были так же интересные предметы, которые заложили неплохую основу и дали понимание того , что програмирование
            предназначенно для облегчения жизни людей, взяв только первую лабораторную работу по дискретной математике - задача о рюкзаке.
        </p>
        <p>
            В основном мы программировали на Turbo Pascal и только поверхностно знакомились с языком C, поэтому начиная изучать PHP нужно было привыкать к новому синтаксису и
            динамической типизации данных, но это не вызвало сложностей. Во время обучения у меня очень неплохо получалось писать код используя процедурный подход, а вот с ООП были проблемы.
            Я так за пять лет обучения и не понял ООП, поэтому при изучении PHP нужно было приложить усилий для изучения этой пародигмы.
        </p>
        <p>
            На момент мая 2020 годя я изучаю веб программирование около года и в основном делал упор на бекенд.
            Изучал в основном самостоятельно по бесплатным ресурсам и книгам вот некоторые из них:
        </p>
        <ul class="list-group">
            <li class="list-group-item list-group-item-dark">Сайт Дмитрия Трепачева code.mu</li>
            <li class="list-group-item list-group-item-dark">fructcode.com</li>
            <li class="list-group-item list-group-item-dark">otus.ru</li>
            <li class="list-group-item list-group-item-dark">Видеокурс CS-50 (очень хорошо помог вспомнить то что учил в академии)</li>
            <li class="list-group-item list-group-item-dark">Книга PHP в подлиннике Игоря Симдянова и Дмитрия Котерова</li>
            <li class="list-group-item list-group-item-dark">Ну и конечно же оффициальная документация технологий с которыми сталкивался</li>
        </ul>
        <br>
        <p>
            На данный момент я имею вот такой стек технологий:
        </p>
        <ul class="list-group">
            <li class="list-group-item list-group-item-dark">PHP 7+</li>
            <li class="list-group-item list-group-item-dark">Laravel 5+</li>
            <li class="list-group-item list-group-item-dark">Шаблонизатор Blade</li>
            <li class="list-group-item list-group-item-dark">HTML 5</li>
            <li class="list-group-item list-group-item-dark">CSS 3</li>
            <li class="list-group-item list-group-item-dark">Основы Bootstrap 4</li>
            <li class="list-group-item list-group-item-dark">Основы командной строки Linux</li>
            <li class="list-group-item list-group-item-dark">Основы JS</li>
            <li class="list-group-item list-group-item-dark">ООП</li>
            <li class="list-group-item list-group-item-dark">MVC</li>
            <li class="list-group-item list-group-item-dark">Регулярные выражения</li>
            <a href="https://github.com/ProPrator" class="list-group-item list-group-item-action list-group-item-dark">Репозиторий GitHub</a>
            <li class="list-group-item list-group-item-dark">SSH</li>
        </ul>
    </div>
@endsection
