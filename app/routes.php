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

/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::get('/wel', 'WelcomeController@index');

//Route::resource('admin', 'LoginController');

Route::get('admin/login', 'LoginController@login');

Route::get('/users', function()
{
	return View::make('users');
});
