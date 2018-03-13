<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get ('/', function () {
    return view ('produtos.principal');
});

//PRODUTOS
Route::get('/produto', ['as' => 'produto', 'uses' => 'ProdutoController@principal']);
Route::get('/produto/form', ['as' => 'produto-form', 'uses' => 'ProdutoController@form']);
Route::get('/produto/listar', ['as' => 'produto-listar', 'uses' => 'ProdutoController@listar']);
Route::post('/produto/gravar', ['as' => 'produto-gravar', 'uses' => 'ProdutoController@gravar']);
Route::get('/produto/editar/{id?}', ['as' => 'produto-editar', 'uses' => 'ProdutoController@editar']);
Route::get('/produto/excluir/{id?}', ['as' => 'produto-excluir', 'uses' => 'ProdutoController@excluir']);
