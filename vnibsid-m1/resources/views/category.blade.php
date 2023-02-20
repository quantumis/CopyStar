@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Управление категориями</h1>
        <table class="cat-table">
            @foreach ($category as $c)
                <tr>
                    <td><p class="m-0">{{$c->id}}.</p></td>
                    <td><p class="m-0">{{$c->name}}</p></td>
                    <td>
                        <form action="/admin/category/edit/{{$c->id}}">
                            <input type="text" name="new_name">
                            <button type="submit" class="btn btn-primary">Изменить</a>
                        </form>
                    </td>
                    <td><a href="/admin/category/delete/{{$c->id}}" class="btn btn-danger">Удалить</a></td>
                </tr>
            @endforeach
        </table>
        <form action="/admin/category/add">
            <input type="text" name="cat_name">
            <button class="btn btn-success" type="submit">Добавить категорию</button>
        </form>
    </div>
@endsection
