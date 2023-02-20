@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/admin/product/edit/{{$product->id}}">
        <p class="inp-desc">Название</p><input type="text" name="name" value="{{$product->name}}"><br>
            <p class="inp-desc">Цена</p><input type="number" name="price" value="{{$product->price}}"><br>
            <p class="inp-desc">Страна</p><input type="text" name="country" value="{{$product->country}}"><br>
            <p class="inp-desc">Модель</p><input type="text" name="model" value="{{$product->model}}"><br>
            <p class="inp-desc">Год</p><input type="number" name="year" value="{{$product->year}}"><br>
            <p class="inp-desc">Кол-во</p><input type="number" name="count" value="{{$product->count}}"><br>
            <p class="inp-desc">Категория</p>
            <select name="category" id="category">
                @foreach ($category as $c)
                @if ($c->id == $product->id_cat)
                    <option selected value="{{$c->id}}">{{$c->name}}</option>
                @endif
                    <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
            <p class="inp-desc">Фото</p><input type="file" name="photo" value="{{$product->photo}}"><br>
            <button class="btn btn-primary mt-2" type="submit">Изменить </button>
        </form>
    </div>
@endsection
