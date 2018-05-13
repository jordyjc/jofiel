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


// Inyección de dependecnias de Categoria

Route::bind('category', function ($category)
{
    return App\Category::find($category);
});


// Inyeccion de dependencias a Usuarios

Route::bind('user', function ($user)
{
    return App\User::find($user);
});



////// ***********************************************************


Route::get('/', [
    'as' => 'stora',
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

    // Valida que el usuario haya iniciado sesion

    Route::get('order-detail', [
        'middleware' => 'auth',
        'as' => 'order-detail',
        'uses' => 'CartController@orderDetail'
    ]);


  /*  
    // Rutas de Autenticación
    
    Route::get('auth/login', [
        'as' => 'login-get',
        'uses' => 'Auth\LoginController@getLogin'
    ]);

    Route::post('auth/login', [
        'as' => 'login-post',
        'uses' => 'Auth\LoginController@postLogin'
    ]);

    Route::get('auth/logout', [
        'as' => 'logout',
        'uses' => 'Auth\LoginController@logout'
    ]);

    // Rutas de Registro

    Route::get('auth/register', [
        'as' => 'register-get',
        'uses' => 'Auth\AuthController@getRegister'
    ]);

    Route::post('auth/register', [
        'as' => 'register-post',
        'uses' => 'Auth\AuthController@postRegister'
    ]);

    */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// PayPal

//Enviamos nuestro pedido a PayPal

Route::get('payment', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment',
));

// Después de realizar el pago, PayPal redirecciona a esta ruta
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));

// ADMIN.............

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin', 'middleware' => 'admin'], function()
{

    Route::get('home', function (){
        return view('home');
    });
    
    Route::resource('category', 'CategoryController');
    
    Route::resource('product', 'ProductController');
    
    Route::resource('user', 'UserController');
    
    
    // Peticion para lostarlos en nuetsro panel
    
    Route::get('orders', [
        
        'as' => 'admin.order.index',
        'uses' => 'OrderController@index'
    ]);
    
    Route::post('order/get-items', [
        'as' => 'admin.order.getItems',
        'uses' => 'OrderController@getItems'
    ]);
    
    Route::get('order/{id}', [
        'as' => 'admin.order.destroy',
        'uses' => 'OrderController@destroy'
    ]);    
    
});