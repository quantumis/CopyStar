<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showCatalog(){
        $products = \App\Models\Product::orderBy('created_at', 'desc')->where('count', '!=', 0)->get();
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

    /*---BOTTOM IS A API FUNCTIONS---*/

    public function show($category, $sort, $auth){
        if($category != "empty"){
            if($sort == "empty" || $sort == "created_at"){
                if($category == "null"){
                    $products = \App\Models\Product::orderBy('created_at', 'desc')->where('count', '!=', 0)->get();
                }else{
                    $products = \App\Models\Product::orderBy('created_at', 'desc')->where('id_cat',  $category)->where('count', '!=', 0)->get();
                }
            }else{
                if($category == "null"){
                    $products = \App\Models\Product::orderBy($sort, 'desc')->where('count', '!=', 0)->get();
                }else{
                    $products = \App\Models\Product::orderBy($sort, 'desc')->where('id_cat',  $category)->where('count', '!=', 0)->get();
                }
            }
        }

        return response()->json($products, 200);
    }

    /*-------------------------------*/
}
