<?php
/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 22:51
 */

Route::post('login', 'UsuarioController@login');

Route::group(['middleware' => 'jwt:usuario'], function(){
    Route::apiResource('produto', 'ProdutoController');
    Route::apiResource('marca', 'MarcaController');
    Route::apiResource('categoria', 'CategoriaController');
});


