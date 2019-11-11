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
    return redirect()->route('cadastro');
});

Route::get('/home', function () {
    return redirect()->route('cadastro');
});

Route::get('/logout', function()
{
    Auth::logout();
    Session::flush();
    return Redirect::to('/login');
});

Auth::routes();

Route::get('/users', function() {
    return view('users.index');
})->name('user')->middleware('auth');



//------------------------------------------------------------------------------------------------

Route::middleware('auth')->group(function () {
    
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

    //--Rotas de envio de email-------------------------------------------------------------------
    Route::get('/email/{id}', 'DemandController@sendEmail')->name('email');





    
   
});