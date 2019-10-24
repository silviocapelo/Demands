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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/users', function() {
    return view('users.index');
})->name('user')->middleware('auth');


//--------------------------------------------------------------------------

// Route::get('users', 'UsersController@index')->name('user');
// Route::get('userscreate','UsersController@create')->name('user.create');
// Route::post('usersstore','UsersController@store')->name('user.store');
// Route::get('useredit/{id}', 'UsersController@edit')->name('user.edit');
// Route::post('userupdate/{id}', 'UsersController@update')->name('user.update');


// Route::get('franchisee', 'FranchiseeController@index')->name('franchisee');
// Route::get('franchiseecreate', 'FranchiseeController@create')->name('franchisee.create');
// Route::post('franchisestore', 'FranchiseeController@store')->name('franchisee.store');
// Route::get('franchiseedit/{id}', 'UsersController@edit')->name('franchisee.edit');
// Route::post('franchiseupdate/{id}', 'UsersController@update')->name('franchisee.update');


//--Rotas de Cadastro de demandas------------------------------------------------------------
Route::get('/cadastro', 'DemandController@index')->name('cadastro');
Route::post('/cadastro/store', 'DemandController@store')->name('cadastro.store');
Route::get('/cadastro/create', 'DemandController@create')->name('cadastro.create');
Route::get('/cadastro/{id}/edit', 'DemandController@edit')->name('cadastro.edit');
Route::post('/cadastro/{id}/update', 'DemandController@update')->name('cadastro.update');

//--Rotas de cadastro de usuários-------------------------------------------------------------
Route::get('/usuario', 'UsersController@index')->name('usuario');
Route::post('/usuario/store', 'UsersController@store')->name('usuario.store');
Route::get('/usuario/create', 'UsersController@create')->name('usuario.create');
Route::get('/usuario/{id}/edit', 'UsersController@edit')->name('usuario.edit');
Route::post('/usuario/{id}/update', 'UsersController@update')->name('usuario.update');


//teste
Route::get('/teste', 'DemandController@teste');
        