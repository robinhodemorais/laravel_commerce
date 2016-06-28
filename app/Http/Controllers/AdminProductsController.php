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

    public function create(){
        return "View Create";
    }

    public function edit($id){
        return "View Edit registro ".$id;
    }

    public function remove($id){
        return "View Remove registro ".$id;
    }

}
