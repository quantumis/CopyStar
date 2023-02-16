<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showCatalog(Request $req){
        if($req->filter == null && $req->category == null){
            $products = \App\Models\Product::orderBy('created_at', 'desc')->where('count', '!=', 0)->get();
        }
        else{
            if($req->category == "null"){
                $products = \App\Models\Product::orderBy($req->filter, 'desc')->where('count', '!=', 0)->get();
            }
            else{
                $products = \App\Models\Product::orderBy($req->filter, 'desc')->where('id_cat', $req->category)->where('count', '!=', 0)->get();
            }
        }

        $category = \App\Models\Category::all();
        return view('catalog', ["products" => $products, "category" => $category]);
    }

    public function product($id){
        $product = \App\Models\Product::find($id);
        return view('product', ["product" => $product]);
    }

    public function about(){
        $products = \App\Models\Product::orderBy('created_at', 'desc')->limit(5)->get();
        return view('about', ["products" => $products]);
    }

    /*BOTTOM IS A API FUNCTIONS*/

    public function show(){
        if($_POST["category"] != "empty"){
            if($_POST["sort"] == "empty" || $_POST["sort"] == "created_at"){
                if($_POST["category"] == "null"){
                    $products = \App\Models\Product::orderBy('created_at', 'desc')->where('count', '!=', 0)->get();
                }else{
                    $products = \App\Models\Product::orderBy('created_at', 'desc')->where('id_cat',  $_POST['category'])->where('count', '!=', 0)->get();
                }
            }else{
                if($_POST["category"] == "null"){
                    $products = \App\Models\Product::orderBy($_POST["sort"], 'desc')->where('count', '!=', 0)->get();
                }else{
                    $products = \App\Models\Product::orderBy($_POST["sort"], 'desc')->where('id_cat',  $_POST['category'])->where('count', '!=', 0)->get();
                }
            }
        }
          
        $str = "";
        foreach($products as $product){
        $str.= '<div class="col-lg-4 products-elem">
                    <div class="card my-card">
                        <a href="/public/product/'.$product->id.'">
                            <div class="block-img"><img src="/public/img/'.$product->photo.'" alt="'.$product->photo.'" class="img-fluid img-plus"></div>
                        </a>
                        <div><p class="pr-desc"><strong>'.$product->name.'</strong></p></div>
                        <div class="d-flex align-items-center justify-content-between">';
                if(Auth::check()){
                    $str.= '<a href="/public/cart/add/'.$product->id.'" class="btn btn-danger">Купить</a>';
                }else{  }
        
                $str.=     '<p class="m-0 price">'.$product->price.' р.</p>
                        </div>
                    </div>
            </div>';
        }
        echo $str;
    }
}
