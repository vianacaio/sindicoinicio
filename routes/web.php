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
		Route::resource('condominios', 'CondominiosController');
		Route::resource('pessoas', 'PessoasController');
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

Route::resource('condominios', 'CondominiosController');
// Route::resource('condominios/create', 'CondominiosController');


Route::resource('pessoas', 'PessoasController', ['except' => 'show']);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route::group(['prefix' => 'condominios'], function () {
//     Route::get('create', function ()    {
//         return View::make('admin.condominios.create');
//     });
// });