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
        $pRecommend = Product::recommend()->get();
        $categories = Category::all();
        return view('store.index', compact('categories','pFeatured','pRecommend'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        //pega os produtos da categoria x
        $products = Product::ofCategory($id)->get();

        return view('store.category', compact('categories', 'products', 'category'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('store.product', compact('categories', 'product'));
    }
}
