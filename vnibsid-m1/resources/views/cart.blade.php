@extends('layouts.app')

@section('content')
<?php $sum = 0 ?>
    <div class="container">
        <h1 class="title">Корзина</h1>
        @foreach ($carts as $c)
        <div class="row d-flex justify-content-between align-items-center table">
            <div class="col-lg-5"><p class="m-0">{{$c->Product->name}}</p></div>
            <div class="col-lg-1"><a href="/public/cart/minus/{{$c->id}}" class="minus">-</a></div>
            <div class="col-lg-3"><p class="m-0">{{$c->count}}</p></div>
            <div class="col-lg-1"><a href="/public/cart/plus/{{$c->id}}" class="plus">+</a></div>
            <div class="col-lg-2"><p class="m-0">{{$c->count * $c->Product->price}} p.</p></div>
        </div>
        <?php $sum += $c->count * $c->Product->price ?>
        @endforeach

        @if($carts->count() != 0)
        <hr class="mt-4">
        <div><p class="mt-4 sum">Сумма заказа: <span class="underline">{{$sum}}</span> р.</p></div>
        <form action="/public/cart/pay/{{$carts[0]->id_basket}}" class="mt-4">
            <label for="pass" class="sum">Введите пароль:</label>
            <input type="password" name="pass" id="pass">
            <button type="submit" class="btn btn-success">Оформить</button>
        </form>
        @endif
    </div>
@endsection
