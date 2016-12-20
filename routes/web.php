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

use Illuminate\Support\Facades\Gate;

Route::get('/', function () {
	if(Gate::allows('access-admin')) {

		Route::resource('condominios', 'CondominiosController', ['except' => 'show']);
	} else {
		return "Usuário sem permissão de admin";
	}

    // return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('admin2', function () {
    return view('admin_template');
});

Route::get('test', 'TestController@index');

Route::resource('condominios', 'CondominiosController');