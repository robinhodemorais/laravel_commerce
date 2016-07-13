<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class StoreController extends Controller
{
    public function index()
    {
        $pFeatured = Product::featured()->get();

        $categories = Category::all();
        return view('store.index', compact('categories','pFeatured'));
    }
}
