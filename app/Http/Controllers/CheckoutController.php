<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        //dessa forma garente que o usuário está conectado
        $this->middleware('auth');
    }
    /*Metodo para processar o carrinho*/
    public function place(Order $orderModel, OrderItem $orderItem)
    {

        //dd(Auth::user()->id);

        if(!Session::has('cart')) {
            return false;
        }
        //pega o carrinho da sessão
        $cart = Session::get('cart');

        if($cart->getTotal() > 0) {
           $order = $orderModel->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]);

            foreach ($cart->all() as $k=>$item) {
                //cria a order e adiciona os itens na order
                $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
            }
        }

        return view('store.checkout', compact('order'));
    }
}
