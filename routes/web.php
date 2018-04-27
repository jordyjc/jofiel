<?php

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

// Busca en base al slug, lo devuleve y queda vinculado

Route::bind('product', function($slug)
{
    return App\Product::where('slug', $slug) -> first();
});

Route::get('/', [
    'as' => 'home',
    'uses' => 'StoreController@index'
    ]);

Route::get('product/{slug}', [
    'as' => 'product-detail',
    'uses' => 'StoreController@show'
    ]);

    // Carrito

    
    Route::get('cart/show', [
        'as' => 'cart-show',
        'uses' => 'CartController@show'
    ]);

    
    // Se ejecuta el método add y permite agregar un item al carrito
    Route::get('cart/add/{product}', [
        'as' => 'cart-add',
        'uses' => 'CartController@add'
    ]);

    Route::get('cart/delete/{product}',[
        'as' => 'cart-delete',
        'uses' => 'CartController@delete'
    ]);
    
    Route::get('cart/trash',[
        'as' => 'cart-trash',
        'uses' => 'CartController@trash'
    ]);

    Route::get('cart/update/{product}/{quantity?}',[
        'as' => 'cart-update',
        'uses' => 'CartController@update'
    ]);
    