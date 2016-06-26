<?php

namespace CodeCommerce\Http\Controllers;


class WelcomeController extends Controller
{

    public function index(){

        return view('welcome', compact('welcome'));
    }

}
