@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">{{$product->name}}</h1>
        <div class="row">
            <div class="col-lg-6">
                <div><img src="/public/img/{{$product->photo}}" alt="{{$product->photo}}" class="img-fluid"></div>
            </div>
            <div class="col-lg-6">
                <p>Характеристики</p>
                <ul>
                    <li>Страна производитель : {{$product->country}}</li>
                    <li>Год выпуска : {{$product->year}}</li>
                    <li>Модель : {{$product->model}}</li>
                    <li>Тип товара : {{$product->Category->name}}</li>
                </ul>
            </div>
            <div class="col-lg-6 d-flex justify-content-between align-items-center">
                <div><p class="m-0">{{$product->price}} p.</p></div>

                @guest
                @else
                <div><a href="/public/cart/add/{{$product->id}}" class="btn btn-danger">Купить</a></div>
                @endguest
            </div>
        </div>
    </div>
@endsection
