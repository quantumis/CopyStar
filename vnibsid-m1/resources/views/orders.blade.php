@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Мои заказы</h1>
        @foreach ($orders as $o)
        <h2>Заказ №{{$o->id_basket}}</h2>
        <div class="row d-flex justify-content-between align-items-center table">
            <div class="col-lg-5"><p class="m-0">{{$o->Product->name}}</p></div>
            <div class="col-lg-3"><p class="m-0">{{$o->count}}</p></div>
            <div class="col-lg-2"><p class="m-0">{{$o->count * $o->Product->price}} p.</p></div>
        </div>
        @endforeach
    </div>
@endsection
