<?php

Route::get('/', 'WelcomeController@index');
//Route::get('exemplo', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('admin/categories', 'AdminCategoriesController@index');
Route::get('admin/products', 'AdminProductsController@index');