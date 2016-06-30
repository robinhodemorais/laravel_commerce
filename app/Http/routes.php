<?php

Route::get('/', 'WelcomeController@index');
//Route::get('exemplo', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::group(['prefix'=> 'admin/categories'], function () {
    Route::get('', 'AdminCategoriesController@index');
    Route::get('create', 'AdminCategoriesController@create');
    Route::get('edit/{id}', 'AdminCategoriesController@edit');
    Route::get('remove/{id}', 'AdminCategoriesController@remove');
});

Route::group(['prefix'=> 'admin/products'], function () {
    Route::get('', 'AdminProductsController@index');
    Route::get('create', 'AdminProductsController@create');
    Route::get('edit/{id}', 'AdminProductsController@edit');
    Route::get('remove/{id}', 'AdminProductsController@remove');
});

/*Route::group(['prefix'=> 'categories'], function () {
    Route::post('', 'CategoriesController@store');
    Route::get('', 'CategoriesController@index');
    Route::get('/create', 'CategoriesController@create');
    Route::get('/{id}/destroy', 'CategoriesController@destroy');
});*/
Route::post('categories', ['as'=>'categories', 'uses'=>'CategoriesController@store']);
Route::get('categories', ['as'=>'categories.store', 'uses'=>'CategoriesController@index']);
Route::get('categories/create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
Route::get('categories/{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
Route::get('categories/{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
Route::put('categories/{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
