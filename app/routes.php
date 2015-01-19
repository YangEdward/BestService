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

Route::resource('/admin/users', 'UserController');

Route::get('/admin/users/show/{id}', 'UserController@show');
Route::get('/admin/users/edit/{id}', 'UserController@edit');
Route::get('/admin/users/destroy/{id}', 'UserController@destroy');
Route::get('/admin/users/update/{id}', 'UserController@show');

Route::resource('admin/main-class', 'ComponentController');

Route::get('/', 'LoginController@login');

Route::get('product/show', 'StyleController@show');

Route::get('project/hire-post', 'CustomerProjectController@hirePost');

Route::get('about-us', function(){
	return View::make('about.about-us');
});

Route::get('/users', function()
{
	return View::make('users');
});
