@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Управление товарами</h1>
        <table class="cat-table">
            @foreach ($product as $p)
                <tr class="tr-bottom">
                    <td><p class="m-0">{{$loop->iteration}}.</p></td>
                    <td><p class="m-0">{{$p->name}}</p></td>
                    <td><p class="m-0">{{$p->price}}</p></td>
                    <td><p class="m-0">{{$p->country}}</p></td>
                    <td><p class="m-0">{{$p->model}}</p></td>
                    <td><p class="m-0">{{$p->Category->name}}</p></td>
                    <td><p class="m-0">{{$p->year}}</p></td>
                    <td><p class="m-0">{{$p->count}}</p></td>
                    <td class="img-td"><img src="/img/{{$p->photo}}" alt="{{$p->photo}}"></td>
                    <td><a href="/admin/product/edit/{{$p->id}}" class="btn btn-primary">Изменить</a></td>
                    <td><a href="/admin/product/delete/{{$p->id}}" class="btn btn-danger">Удалить</a></td>
                </tr>
            @endforeach
        </table>
        <form action="/admin/product/add" class="product-add">
            <p class="inp-desc">Название</p><input type="text" name="name"><br>
            <p class="inp-desc">Цена</p><input type="number" name="price"><br>
            <p class="inp-desc">Страна</p><input type="text" name="country"><br>
            <p class="inp-desc">Модель</p><input type="text" name="model"><br>
            <p class="inp-desc">Год</p><input type="number" name="year"><br>
            <p class="inp-desc">Кол-во</p><input type="number" name="count"><br>
            <p class="inp-desc">Категория</p>
            <select name="category" id="category">
                @foreach ($category as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
            <p class="inp-desc">Фото</p><input type="file" name="photo"><br>
            <button class="btn btn-success" type="submit">Добавить </button>
        </form>
    </div>
@endsection
