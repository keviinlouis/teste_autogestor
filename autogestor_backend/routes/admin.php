<?php
/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 22:51
 */

Route::post('login', 'AdminController@login');

Route::group(['middleware' => 'jwt:admin'], function(){
    Route::apiResource('usuario', 'UsuarioController');
    Route::get('permissoes', 'PermissaoController@index');
});
