<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;

class AdminCategoriesController extends Controller
{
    private $categories;

    public function __construct(Category $category)
    {
        $this->middleware('guest');
        $this->categories($category);
    }


    public function index(){
        $categories = $this->categories->all();

        return view('index', compact('categories'));
    }


}
