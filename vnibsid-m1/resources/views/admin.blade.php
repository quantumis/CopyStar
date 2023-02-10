@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Панель управления</h1>
        <div class="d-flex justify-content-around">
            <div><a href="/public/admin/orders" class="tdn btn btn-danger">Заказы</a></div>
            <div><a href="/public/admin/product" class="tdn btn btn-success">Товары</a></div>
            <div><a href="/public/admin/category" class="tdn btn btn-primary">Категории</a></div>
        </div>
    </div>
@endsection
