<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login.login');
});

Route::group(array('prefix'=>'admin'),function() {

    Route::get('login','LoginController@index',array('as' => 'login'))->before('guest');
    Route::post('login','LoginController@login');
    Route::get('logout','LoginController@logout',array('as' => 'logout' ))->before('auth');

    Route::resource('users', 'UsersController');
    Route::resource('vehicles', 'VehiclesController');
    Route::resource('clients', 'ClientsController');

    Route::get('clients/showAsignar/{id}', 'ClientsController@getAsignar');
    Route::get('clients/Asignar/{id}/{cedula}', 'ClientsController@Asignar');
    Route::get('clients/DesAsignar/{id}/{cedula}', 'ClientsController@DesAsignar');

});