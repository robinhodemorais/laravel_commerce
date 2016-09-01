<?php

Route::group(['prefix'=>''], function () {
    Route::get('/', ['as' => 'store.index', 'uses' => 'StoreController@index']);
    Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
    Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
    Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);
    Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
    Route::put('cart/update/{id}', ['as' => 'store.cart.update', 'uses' => 'CartController@update']);
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth_admin', 'where'=>['id' => '[0-9]+']], function ()
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
        Route::get('', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::post('', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

        Route::group(['prefix'=>'images'], function (){
            //site.com.br/admin/products/images/[id]/product
            Route::get('{id}/product',['as'=>'products.images', 'uses'=>'ProductsController@images']);
            Route::get('create/{id}/product',['as'=>'products.images.create', 'uses'=>'ProductsController@createImage']);
            Route::post('store/{id}/product',['as'=>'products.images.store', 'uses'=>'ProductsController@storeImage']);
            Route::get('destroy/{id}/image',['as'=>'products.images.destroy', 'uses'=>'ProductsController@destroyImage']);
        });
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('', ['as' => 'users', 'uses' => 'UsersController@index']);
        Route::post('', ['as' => 'users.store', 'uses' => 'UsersController@store']);
        Route::get('create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
        Route::get('{id}/destroy', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
        Route::get('{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
        Route::put('{id}/update', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    });
});


//Tem que estar autenticado
Route::group(['middleware'=>'auth'], function (){
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});

Route::get('test', 'CheckoutController@test');

Route::get('email', function (){
    //dispara o evento
    return view('store.email');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'test' => 'TestController',
]);


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

