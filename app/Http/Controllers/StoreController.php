<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class StoreController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('store.index', compact('categories'));
    }
}
