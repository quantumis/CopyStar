<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function category(){
        $category = \App\Models\Category::all();
        return view('category', ["category"=>$category]);
    }

    public function product(){
        $product = \App\Models\Product::all();
        $category = \App\Models\Category::all();
        return view('product-admin', ["product"=>$product, "category"=>$category]);
    }

    public function catDelete($id){
        $cat = \App\Models\Category::find($id);
        $cat->delete();
        return redirect('/admin/category');
    }

    public function catAdd(Request $req){
        $cat = new \App\Models\Category;
        $cat->name = $req->cat_name;
        $cat->save();
        return redirect('/admin/category');
    }

    public function catEdit($id, Request $req){
        $cat = \App\Models\Category::find($id);
        $cat->name = $req->new_name;
        $cat->save();
        return redirect('/admin/category');
    }

    public function prodAdd(Request $req){
        $prod = new \App\Models\Product;
        $prod->name = $req->name;
        $prod->price = $req->price;
        $prod->country = $req->country;
        $prod->model = $req->model;
        $prod->count = $req->count;
        $prod->year = $req->year;
        $prod->photo = $req->photo;
        $prod->id_cat = $req->category;
        $prod->save();
        return redirect('/admin/product');
    }

    public function prodEdit($id, Request $req){
        if($req->name != null){
            $product = \App\Models\Product::find($id);
            $product->name = $req->name;
            $product->price = $req->price;
            $product->country = $req->country;
            $product->count = $req->count;
            $product->photo = $req->photo;
            $product->model = $req->model;
            $product->id_cat = $req->category;
            $product->year = $req->year;
            $product->save();
            return redirect('/admin/product');
        }
        else{
            $category = \App\Models\Category::all();
            $product = \App\Models\Product::find($id);
            return view('buffer', ["product" => $product, "category"=>$category]);
        }
    }

    public function prodDelete($id){
        $product = \App\Models\Product::find($id);
        $product->delete();
        return redirect('/admin/product');
    }

    public function showOrder(Request $req){
        if($req->filter == null || $req->filter == 'null'){
            $orders = \App\Models\Cart::orderBy('created_at', 'desc')->where('status', '!=', 1)->get();
        }
        else{
            $orders = \App\Models\Cart::orderBy('created_at', 'desc')->where('status', $req->filter)->where('status', '!=', 1)->get();
        }

        $buffer = [];

        foreach($orders as $order){
            $buffer[$order->User->surname." ".$order->User->name." ".$order->User->patronymic][$order->id_basket][]  = $order;
        }

        return view('admin-orders', ["orders" => $buffer]);
    }

    public function orderSuccess($user, $id){
        $orders = \App\Models\Cart::where('id_user', $user)->where('id_basket', $id)->get();
        foreach($orders as $o){
            $o->status = 3;
            $o->save();
        }
        return redirect('/admin/orders');
    }

    public function orderReject($user, $id){
        $orders = \App\Models\Cart::where('id_user', $user)->where('id_basket', $id)->get();
        $buf_order = [];
        foreach($orders as $o){
            $buf_order[$o->id_product] = $o->count;
            $o->status = 0;
            $o->save();
        }

        foreach($buf_order as $key => $p){
            $buffer = \App\Models\Product::find($key);
            $buffer->count += $p;
            $buffer->save();
        }
        return redirect('/admin/orders');
    }

}
