<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index');
    }
}
