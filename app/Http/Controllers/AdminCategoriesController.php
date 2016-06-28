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
        $this->categories = $category;
    }

    public function index(){
        $categories = $this->categories->all();
        return view('categories', compact('categories'));
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
