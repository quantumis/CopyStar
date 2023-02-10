@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Управление заказами</h1>
        <div>
            <form action="/public/admin/orders" class="d-flex justify-content-end filters">
                <select name="filter" id="filter">
                    <option value="null">Все</option>
                    <option value="2">Новые</option>
                    <option value="3">Подтвержденные</option>
                    <option value="0">Отмененные</option>
                </select>
                <button type="submit" class="btn btn-primary">Применить</button>
            </form>
        </div>
        <table class="w-100">
            <tr>
                <td>Пользователь</td>
                <td>Номер заказа</td>
                <td>Товар</td>
                <td>Кол-во</td>
                <td>Сумма</td>
            </tr>
            @foreach ($orders as $o)
                <tr>
                    <td>{{$o->User->login}}</td>
                    <td>{{$o->id_basket}}</td>
                    <td>{{$o->Product->name}}</td>
                    <td>{{$o->count}}</td>
                    <td>{{$o->Product->price * $o->count}}</td>
                    @if($o->status == 3) @else<td><a href="/public/admin/order/success/{{$o->id_basket}}" class="btn btn-success">Подтвердить</a></td>@endif
                    @if($o->status == 0) @else<td><a href="/public/admin/order/reject/{{$o->id_basket}}" class="btn btn-danger">Отклонить</a></td>@endif
                </tr>
            @endforeach
        </table>
    </div>
@endsection
