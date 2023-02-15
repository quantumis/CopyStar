<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\ProductController::class, 'about']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\ProductController::class, 'about']);

Route::get('/catalog', [App\Http\Controllers\ProductController::class, 'showCatalog']);

Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'product']);

Route::get('/where', function () {return view('where');});

Route::get('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add']);

Route::get('/cart', [App\Http\Controllers\CartController::class, 'show']);

Route::get('/cart/plus/{id}', [App\Http\Controllers\CartController::class, 'plus']);

Route::get('/cart/minus/{id}', [App\Http\Controllers\CartController::class, 'minus']);

Route::get('/cart/pay/{id}', [App\Http\Controllers\CartController::class, 'pay']);

Route::get('/order', [App\Http\Controllers\CartController::class, 'showOrders']);

Route::get('/order/delete/{id}', [App\Http\Controllers\CartController::class, 'deleteOrders']);


Route::get('/admin', function () {
    if(Auth::user()->role == 2)
        return view('admin');
    else
        echo "Нет прав доступа";
});

Route::get('/admin/category', [App\Http\Controllers\AdminController::class, 'category']);

Route::get('/admin/product', [App\Http\Controllers\AdminController::class, 'product']);

Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'showOrder']);

Route::get('/admin/category/delete/{id}', [App\Http\Controllers\AdminController::class, 'catDelete']);

Route::get('/admin/category/add', [App\Http\Controllers\AdminController::class, 'catAdd']);

Route::get('/admin/category/edit/{id}', [App\Http\Controllers\AdminController::class, 'catEdit']);

Route::get('/admin/product/add', [App\Http\Controllers\AdminController::class, 'prodAdd']);

Route::get('/admin/product/edit/{id}', [App\Http\Controllers\AdminController::class, 'prodEdit']);

Route::get('/admin/product/delete/{id}', [App\Http\Controllers\AdminController::class, 'prodDelete']);

Route::get('/admin/order/success/{user}/{id}', [App\Http\Controllers\AdminController::class, 'orderSuccess']);

Route::get('/admin/order/reject/{user}/{id}', [App\Http\Controllers\AdminController::class, 'orderReject']);
