@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Каталог</h1>
        <div>
            <form action="/public/catalog" class="d-flex justify-content-end filters">
                <select name="filter" id="filter">
                    <option value="created_at">Новизна</option>
                    <option value="year">Год</option>
                    <option value="price">Цена</option>
                    <option value="name">Наименование</option>
                </select>
                <select name="category" id="category">
                    @foreach ($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                    <option value="null">Все категории</option>
                </select>
                <button type="submit" class="btn btn-primary">Применить</button>
            </form>
        </div>
        <div class="row row-products">
            @foreach ($products as $p)
                <div class="col-lg-4 products-elem" ajax="{{$p->name}}">
                    <div class="card my-card">
                        <a href="/public/product/{{$p->id}}">
                            <div class="block-img"><img src="/public/img/{{$p->photo}}" alt="{{$p->photo}}" class="img-fluid img-plus"></div>
                        </a>
                        <div><p class="pr-desc"><strong>{{$p->name}}</strong></p></div>
                        <div class="d-flex align-items-center justify-content-between">
                            @guest
                            @else
                            <a href="/public/cart/add/{{$p->id}}" class="btn btn-danger">Купить</a>
                            @endguest
                            <p class="m-0 price">{{$p->price}} p.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="result"></div>
    </div>
    <script src="/public/js/ajax.js"></script>
@endsection
