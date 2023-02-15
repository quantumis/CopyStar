<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
