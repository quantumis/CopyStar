@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">О нас</h1>
        <div class="row">
            <div class="col-lg-3"><img src="/img/logo.png" alt="logo" class="img-fluid br-img"></div>
            <div class="col-lg-9">
                <p class="p-0 desc"><i>Больше, чем дубликаты... Больше, чем чернила... Больше, чем просто машины...</i><br> Мы определенно больше, чем что-то... Чем что, правда, пока не выяснили, но вы всегда можете заказать у нас принтер... <br><br><span><a href="/catalog" class="wow">Больше чем принтер...</a></span></p>
            </div>
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div><button id="prevarrow" class="arrow"><</button></div>
                <div class="slider">
                    @foreach ($products as $p)
                    @if ($loop->index == 0)
                        <div class="sl-item active">
                            <div class="d-flex justify-content-center"><img src="/img/{{$p->photo}}" alt="{{$p->photo}}" class="img-fluid"></div>
                            <p class="text-center sl-text">{{$p->name}}</p>
                        </div>
                    @else
                        <div class="sl-item">
                            <div class="d-flex justify-content-center"><img src="/img/{{$p->photo}}" alt="{{$p->photo}}" class="img-fluid"></div>
                            <p class="text-center sl-text">{{$p->name}}</p>
                        </div>
                    @endif
                    @endforeach
                </div>
                <div><button id="nextarrow" class="arrow">></button></div>
            </div>
        </div>
    </div>
    <script src="/js/script.js"></script>
@endsection
