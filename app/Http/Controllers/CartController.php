<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;

class CartController extends Controller
{
    public function __construct()
    {
        if (!\Session::has('cart')) \Session::put('cart',array());
    }

    // Show Cart

    public function show()
    {
        $cart =\Session::get('cart');
        $total = $this->total();
        return view('store.cart', compact('cart', 'total'));
    }

    // Add Item

    public function add (Product $product)
    {
        //Se recibe la variable de sesión
        $cart = \Session::get('cart');

        // Por defecto la cantidad es 1
        $product->quantity = 1;

        // Se utliza el slug como indice y se guarda en el array
        $cart [$product->slug] = $product;

        // Se actualiza la variable de Sesión cada vez que realiza la operación
        \Session::put('cart', $cart);

        // Redireccionar a show
        return redirect()->route('cart-show');

    }

    // Delete Item

    public function delete(Product $product)
    {
        $cart = \Session::get('cart');
        // Permite eliminar un elemnto de un array
        unset($cart[$product->slug]);
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    // Update Item

    public function update(Product $product, $quantity)
    {
        $cart = \Session::get('cart');
        $cart[$product->slug]->quantity = $quantity;

        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    // Trash Cart

    public function trash()
    {
        \Session::forget('cart');
        return redirect()->route('cart-show');
    }

    // Total

    private function total()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }

    // Detalle del Pedido

    public function orderDetail()
    {
        // Verifica que por lo menos haya un item en el carrito
        if(count(\Session::get('cart')) <= 0) return redirect()->route('stora');

        // Guarda lo que hay en la variable del carrito
        $cart = \Session::get('cart');
        $total = $this->total();

        return  view('store.order-detail', compact('cart', 'total'));
    }
}
