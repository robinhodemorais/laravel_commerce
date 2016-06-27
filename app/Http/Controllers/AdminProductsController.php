<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Http\Requests;

class AdminProductsController extends Controller
{
    private $products;
    public function __construct(Product $product)
    {
        $this->middleware('guest');
        $this->products = $product;
    }

    public function index(){
        $products = $this->products->all();
        return view('products', compact('products'));
    }
}
