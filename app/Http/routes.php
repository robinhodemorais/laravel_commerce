<?php

Route::group(['prefix'=>'admin', 'where'=>['id' => '0-9+']], function ()
{
    Route::group(['prefix'=>'categories'], function ()
    {
        Route::post('/', ['as'=>'categories', 'uses'=>'CategoriesController@store']);
        Route::get('/', ['as'=>'categories.store', 'uses'=>'CategoriesController@index']);
        Route::get('create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
        Route::get('{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
        Route::get('{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
        Route::put('{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);

    });

    Route::group(['prefix'=>'products'], function () {
        Route::post('/', ['as' => 'products', 'uses' => 'ProductsController@store']);
        Route::get('/', ['as' => 'products.store', 'uses' => 'ProductsController@index']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

        //site.com.br/admin/products/images/[id]/product
        //Route::group(['prefix'=>'images'], function (){
            Route::get('{id}/images', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
        //});
    });
});

Route::get('/', 'WelcomeController@index');
//Route::get('exemplo', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
/*
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
*/
/*Route::group(['prefix'=> 'categories'], function () {
    Route::post('', 'CategoriesController@store');
    Route::get('', 'CategoriesController@index');
    Route::get('/create', 'CategoriesController@create');
    Route::get('/{id}/destroy', 'CategoriesController@destroy');
});*/

