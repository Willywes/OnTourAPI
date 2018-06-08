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

Route::get('/', function () {
    return view('welcome');
});

//ROLES
Route::get('roles', 'RolController@index');
Route::get('roles/{id}', 'RolController@show');

//USUARIOS
Route::get('usuarios', 'UserController@index');
Route::get('usuarios/{id}', 'UserController@show');
Route::post('usuarios', 'UserController@store');
Route::put('usuarios/{id}', 'UserController@update');
Route::delete('usuarios/{id}', 'UserController@delete');

//Route::get('articles', 'ArticleController@index');
//Route::get('articles/{id}', 'ArticleController@show');
//Route::post('articles', 'ArticleController@store');
//Route::put('articles/{id}', 'ArticleController@update');
//Route::delete('articles/{id}', 'ArticleController@delete');
