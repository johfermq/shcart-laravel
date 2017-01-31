<?php

//Productos
Route::get('/', [
    'uses' => 'ProductController@index',
    'as' => 'product.index'
]);

//Compras
Route::group(['prefix' => 'compras'], function() {
    
    Route::get('comprar', [
        'uses' => 'ProductController@comprar',
        'as' => 'product.comprar'
    ]);

    Route::post('comprar', [
        'uses' => 'ProductController@postcomprar',
        'as' => 'product.postcomprar'
    ]);
    
    
    Route::get('anadir-al-carro/{id}', [
    'uses' => 'ProductController@anadiralcarro',
    'as' => 'product.anadiralcarro'
    ]);
    Route::get('remover-un-item/{id}', [
    'uses' => 'ProductController@removerunitemcarro',
    'as' => 'product.removerunitemcarro'
    ]);
    Route::get('remover-item/{id}', [
    'uses' => 'ProductController@removeritemcarro',
    'as' => 'product.removeritemcarro'
    ]);
    Route::get('carro', [
        'uses' => 'ProductController@carro',
        'as' => 'product.carro'
    ]);
});

//Usuario
Route::group(['prefix' => 'usuario'], function() {
    Route::group(['middleware' => 'guest'], function() {
        Route::get('login' , 'UserController@login')->name('user.login');
        Route::post('login' , 'UserController@postlogin')->name('user.postlogin');
    });
    Route::group(['middleware' => 'auth'], function() {
        Route::get('perfil' , 'UserController@perfil')->middleware('auth')->name('user.perfil');
        Route::get('logout' , 'UserController@logout')->name('user.logout');
    });
});