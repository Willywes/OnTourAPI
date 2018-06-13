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



//ABONO
Route::get('abonos', 'AbonoController@index');
Route::get('abonos/{id}', 'AbonoController@show');
Route::post('abonos', 'AbonoController@store');
Route::put('abonos/{id}', 'AbonoController@update');
Route::delete('abonos/{id}', 'AbonoController@delete');

//ALUMNO
Route::get('alumnos', 'AlumnoController@index');
Route::get('alumnos/{id}', 'AlumnoController@show');
Route::post('alumnos', 'AlumnoController@store');
Route::put('alumnos/{id}', 'AlumnoController@update');
Route::delete('alumnos/{id}', 'AlumnoController@delete');

//CONTRATO
Route::get('contratos', 'ContratoController@index');
Route::get('contratos/{id}', 'ContratoController@show');
Route::post('contratos', 'ContratoController@store');
Route::put('contratos/{id}', 'ContratoController@update');
Route::delete('contratos/{id}', 'ContratoController@delete');

//CURSO
Route::get('cursos', 'CursoController@index');
Route::get('cursos/{id}', 'CursoController@show');
Route::post('cursos', 'CursoController@store');
Route::put('cursos/{id}', 'CursoController@update');
Route::delete('cursos/{id}', 'CursoController@delete');


//USUARIOS
Route::get('usuarios', 'UserController@index');
Route::get('usuarios/{id}', 'UserController@show');
Route::post('usuarios', 'UserController@store');
Route::put('usuarios/{id}', 'UserController@update');
Route::delete('usuarios/{id}', 'UserController@delete');

//ROLES
Route::get('roles', 'RolController@index');
Route::get('roles/{id}', 'RolController@show');