@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">О нас</h1>
        <div class="row">
            <div class="col-lg-4"><img src="/public/img/logo.png" alt="logo" class="img-fluid br-img"></div>
            <div class="col-lg-8">
                <p class="p-0 desc"><i>Ты любишь работать и умеешь отдыхать?! Этот мир лежит лежит у твоих ног, если у тебя есть ОН</i><br> <span class="wow">ПРОДУКТ ОТ КОМПАНИИ TRUE GAMES</span></p>
            </div>
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div><p id="prev" class="arrow"><</p></div>
                <div class="slider">
                    @foreach ($products as $p)
                    @if ($loop->index == 0)
                        <div class="sl-item active"><img src="/public/img/{{$p->photo}}" alt="{{$p->photo}}" class="img-fluid"></div>
                    @else
                        <div class="sl-item d-none"><img src="/public/img/{{$p->photo}}" alt="{{$p->photo}}" class="img-fluid"></div>
                    @endif
                    @endforeach
                </div>
                <div><p id="next" class="arrow">></p></div>
            </div>
        </div>
    </div>
@endsection
