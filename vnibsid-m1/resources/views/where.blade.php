@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Где нас найти?</h1>
        <div class="row">
            <div class="col-lg-7">
                <img src="/public/img/map.jpg" alt="map.jpg" class="img-fluid">
            </div>
            <div class="col-lg-5 d-flex flex-column justify-content-between">
                <div>
                    <p class="main-contacts">Наши контакты:</p>
                <ul class="list-contact">
                    <li>Телефон: 8-800-555-35-35</li>
                    <li>E-mail: true-games@mail.ru</li>
                    <li>Адрес: г.Омск, ул.Кирова, д.12/2</li>
                </ul>
                </div>
                <div class="d-flex justify-content-between social">
                    <a href="">Telegram</a>
                    <a href="">ВКонтакте</a>
                    <a href="">Одноклассники</a>
                </div>
            </div>
        </div>
    </div>
@endsection
