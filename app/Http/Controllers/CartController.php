<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart;

    /**
     * CartController constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }


    /*Listagem do carrinho de compras*/
    public function index()
    {
        /*
         * Toda vez que mudar a sessão o carrinho será atualizado
         * quando está utilizando a sessão
         */
        //se não conter uma sessão cart
        if(!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }

        return view('store.cart', ['cart' => Session::get('cart')]);
    }
}
