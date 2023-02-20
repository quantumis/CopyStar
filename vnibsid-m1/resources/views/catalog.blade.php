@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Каталог</h1>
        <div class="d-flex justify-content-end filters">
            <select name="filter" id="filter">
                <option value="created_at" class="opt-f" selected>Новизна</option>
                <option value="year" class="opt-f">Год</option>
                <option value="price" class="opt-f">Цена</option>
                <option value="name" class="opt-f">Наименование</option>
            </select>
            <select name="category" id="category">
                <option value="null" selected>Все категории</option>
                @foreach ($category as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row row-products">
            @foreach ($products as $p)
                <div class="col-lg-4 products-elem">
                    <div class="card my-card">
                        <a href="/product/{{$p->id}}">
                            <div class="block-img"><img src="/img/{{$p->photo}}" alt="{{$p->photo}}" class="img-fluid img-plus"></div>
                        </a>
                        <div><p class="pr-desc"><strong>{{$p->name}}</strong></p></div>
                        <div class="d-flex align-items-center justify-content-between">
                            @guest
                            @else
                                <a href="/cart/add/{{$p->id}}" class="btn btn-danger" id="pay-btn">Купить</a>
                            @endguest
                            <p class="m-0 price">{{$p->price}} p.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="/js/ajax/ajax-filter.js"></script>
@endsection
