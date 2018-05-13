<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Order;
use App\OrderItem;

class PaypalController extends BaseController
{
    private $_api_context;

    public function __construct()
    {
        // Setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postPayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = array();
        $subtotal = 0;
        $cart = \Session::get('cart');
        $currency = 'MXN';

        foreach ($cart as $producto)
        {
            $item = new Item();
            $item->setName($producto->name)
                ->setCurrency($currency)
                ->setDescription($producto->extract)
                ->setQuantity($producto->quantity)
                ->setPrice($producto->price);

            $items[] = $item;
            $subtotal += $producto->quantity * $producto->price;
        }

        // Se crea otro objeto para guardar el array

        $item_list = new ItemList();
        $item_list->setItems($items);

        // Crear otro objeto para agregar un costo de envió (opcional)

        $details = new Details();
        $details->setSubtotal($subtotal)
            ->setShipping(100);

        // Calcular el total a pagar

        $total = $subtotal + 100;

        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($total)
            ->setDetails($details);

        // Se pasa la cantidad que contiene el total y los items del carrito

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription("Pedido de prueba :)");

        // Se crea otro objeto que recibe la ruta a donde se va a redirigir si acepta el pago o cancela

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status'))
            ->setCancelUrl(\URL::route('payment.status'));

        // Se va arealizar el pago y se configura el tipo de pago

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        // Se ejecuta el objeto create de payment

        try
        {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex)
        {
            if (\Config::get('app.debug'))
            {
                echo "Exception: ", $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else
            {
                die('Ups. Algo salió mal');
            }
        }

        foreach ($payment->getLinks() as $link)
        {
            if ($link->getRel() == 'approval_url')
            {
                $redirect_url = $link->getHref();
                break;
            }
        }


        // agregar pago al id de la sesión

        \Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url))
        {
            // redirecciona a PayPal
            return \Redirect::away($redirect_url);
        }

        return \Redirect::route('cart-show')
            ->with('message', 'Error desconocido');

    }


    // Metodo al cual nos da respuesta PayPal
    public function getPaymentStatus()
    {
        // Obtiene el id del pago de la sesion
        $payment_id = \Session::get('paypal_payment_id');

        // Limpia el id de pago de la sesion
        \Session::forget('paypal_payment_id');

        $payerId = \Input::get('PayerID');
        $token = \Input::get('token');

        if (empty($payerId) || empty($token))
        {
            return \Redirect::route('stora')
                ->with('message', 'Hubo un problema al pagar con PayPal');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId(\Input::get('PayerID'));

        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved')
        {

            $this->saveOrder();

            \Session::forget('cart');

            return \Redirect::route('stora')
                ->with('message', ' Compra realizada correctamente');
        }
        return \Redirect::route('stora')
            ->with('message', 'La compra fue cancelada');
    }


    protected function saveOrder()
    {
        $subtotal = 0;
        $cart = \Session::get('cart');
        $shipping = 100;

        foreach ($cart as $producto)
        {
            $subtotal += $producto->quantity * $producto->price;
        }

        // Se crea un registro que se le va a pasar el subtotal y el user id

        $order = Order::create([
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'user_id' => \Auth::user()->id
        ]);

        // Por cada item se llama a la funcion de guardado

        foreach ($cart as $producto)
        {
            $this->saveOrderItem($producto, $order->id);
        }
    }

    protected function saveOrderItem($producto, $order_id)
    {
        // Se crea un registro

        OrderItem::create([
            'price' => $producto->price,
            'quantity' => $producto->quantity,
            'product_id' => $producto->id,
            'order_id' => $order_id
        ]);
    }


}
