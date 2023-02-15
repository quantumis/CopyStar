@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Мои заказы</h1>
        @foreach ($orders as $o)
        <div class="d-flex justify-content-between">
            <h2>Заказ №{{$o[0]->id_basket}}</h2>
            <div class="d-flex">
                <p class="status-name">Статус заказа: {{$o[0]->Status->name}}</p>
                @if($o[0]->status == 2)<a href="/public/order/delete/{{$o[0]->id_basket}}" class="btn btn-danger max-h-40">Удалить заказ</a>@endif
            </div>
        </div>
        @foreach($o as $oo)
        <div class="row d-flex justify-content-between align-items-center table">
            <div class="col-lg-5"><p class="m-0 pl-20">{{$oo->Product->name}}</p></div>
            <div class="col-lg-3"><p class="m-0">{{$oo->count}}</p></div>
            <div class="col-lg-2"><p class="m-0">{{$oo->count * $oo->Product->price}} p.</p></div>
        </div>
        @endforeach
        @endforeach
    </div>
@endsection
