<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function add($id){
        $product = \App\Models\Product::find($id);
        $buffer = \App\Models\Cart::where('id_product', $id)->where('id_user', Auth::user()->id)->where('status', '1')->get();
        $last = \App\Models\Cart::where('id_user', Auth::user()->id)->latest()->get();

        if($buffer->count() == 0){
            $new_cart = new \App\Models\Cart;
            $new_cart->id_user = Auth::user()->id;
            $new_cart->id_product = $id;
            $new_cart->count = 1;
            if(isset($last[0])){
                if($last[0]->status == 2){
                    $new_cart->id_basket = $last[0]->id_basket + 1;
                }
                else{
                    $new_cart->id_basket = $last[0]->id_basket;
                }
            }
            else{
                $new_cart->id_basket = 1;
            }

            $new_cart->save();
        }
        else{
            $buffer[0]->count++;
            if($product->count < $buffer[0]->count){
                $buffer[0]->count--;
            }

            $buffer[0]->save();
        }

        return redirect('/catalog');
    }

    public function show(){
        $carts = \App\Models\Cart::where('id_user', Auth::user()->id)->where('status', 1)->get();
        return view('cart', ["carts" => $carts]);
    }

    public function plus($id){
        $cart = \App\Models\Cart::find($id);
        $product = \App\Models\Product::find($cart->id_product);
        $cart->count++;
        if($cart->count > $product->count){
            $cart->count--;
        }

        $cart->save();
        return redirect('/cart');
    }

    public function minus($id){
        $cart = \App\Models\Cart::find($id);
        $cart->count--;
        if($cart->count == 0){
            $cart->delete();
        }
        else{
            $cart->save();
        }

        return redirect('/cart');
    }

    public function pay($id, Request $req){
        if(Hash::check($req->pass, Auth::user()->password)){
            $pay_c = \App\Models\Cart::where('id_basket', $id)->get();
            foreach($pay_c as $p){
                $p->status = 2;
                $p->save();
            }

            return redirect('/catalog');
        }
        else{
            return redirect('/cart');
        }
    }

    public function showOrders(){
        $orders = \App\Models\Cart::where('status', 2)->latest()->get();
        return view('orders', ["orders" => $orders]);
    }
}
