@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Управление заказами</h1>
        <div>
            <form action="/admin/orders" class="d-flex justify-content-end filters">
                <select name="filter" id="filter">
                    <option value="2">Новые</option>
                    <option value="3">Подтвержденные</option>
                    <option value="0">Отмененные</option>
                    <option value="null">Все заказы</option>
                </select>
                <button type="submit" class="btn btn-primary">Применить</button>
            </form>
        </div>
        @foreach($orders as $key => $order)
        <div>
            <p class="user-order">Пользователь: {{$key}}</p>
        </div>
        @foreach($order as $key => $ord)
        <div class="d-flex justify-content-between">
            <p class="order-order">Заказ №{{$key}}</p>
            @if($ord[0]->status == 2)<hr>@endif
            <div class="d-flex">
                @if($ord[0]->status != 2) @else<a href="/admin/order/success/{{$ord[0]->id_user}}/{{$key}}" class="btn btn-success max-h-40 mt-auto mb-auto">Подтвердить</a>@endif
                @if($ord[0]->status != 2) @else<a href="/admin/order/reject/{{$ord[0]->id_user}}/{{$key}}" class="btn btn-danger max-h-40 mt-auto mb-auto">Отклонить</a>@endif
            </div>
        </div>
        <table class="w-100">
            <tr class="w-100 bb d-flex">
                <td class="w-25">Товар</td>
                <td class="w-25">Кол-во</td>
                <td class="w-25">Сумма</td>
                <td class="w-25">Дата</td>
            </tr>
            @foreach($ord as $o)
                <tr class="w-100 d-flex justify-content-between">
                    <td class="w-25">{{$o->Product->name}}</td>
                    <td class="w-25">{{$o->count}}</td>
                    <td class="w-25">{{$o->Product->price * $o->count}}</td>
                    <td class="w-25">{{$o->created_at}}</td>
                </tr>
            @endforeach
        </table>
        @endforeach
        @endforeach
    </div>
@endsection
