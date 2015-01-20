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

/* Users about*/
Route::resource('/admin/users', 'UserController');
Route::get('/admin/users/show/{id}', 'UserController@show');
Route::get('/admin/users/edit/{id}', 'UserController@edit');
Route::post('/admin/users/destroy/{id}', 'UserController@destroy');
Route::post('/admin/users/update/{id}', 'UserController@update');
Route::get('/user/login', 'UserController@getLogin');
Route::post('/user/post_login', 'UserController@postLogin');

/* Component about*/
Route::resource('admin/main-class', 'ComponentController');
Route::get('/admin/component/edit/{id}', 'ComponentController@edit');
Route::post('/admin/component/destroy/{id}', 'ComponentController@destroy');
Route::post('/admin/component/update/{id}', 'ComponentController@update');

/* Style about*/
Route::resource('/admin/style', 'StyleController');
Route::get('/admin/style/edit/{id}', 'StyleController@edit');
Route::post('/admin/style/destroy/{id}', 'StyleController@destroy');
Route::post('/admin/style/update/{id}', 'StyleController@update');

/* customer project about*/
Route::resource('/admin/customer', 'CustomerProjectController');
Route::get('/admin/customer/edit/{id}', 'CustomerProjectController@edit');
Route::post('/admin/customer/destroy/{id}', 'CustomerProjectController@destroy');
Route::post('/admin/customer/update/{id}', 'CustomerProjectController@update');

/* staff project about*/
Route::get('/admin/staff', 'StaffProjectController@index');
Route::get('/admin/staff/edit/{id}', 'StaffProjectController@edit');
Route::post('/admin/staff/destroy/{id}', 'StaffProjectController@destroy');
Route::post('/admin/staff/update/{id}', 'StaffProjectController@update');

/* customer project about*/
Route::get('/admin/process', 'ProjectProcessController@index');
Route::get('/admin/process/edit/{id}', 'ProjectProcessController@edit');
Route::post('/admin/process/destroy/{id}', 'ProjectProcessController@destroy');
Route::post('/admin/process/update/{id}', 'ProjectProcessController@update');


Route::get('/', 'LoginController@login');

Route::get('product/show', 'StyleController@showProducts');

Route::get('project/hire-post', 'CustomerProjectController@hirePost');

Route::get('about-us', function(){
	return View::make('about.about-us');
});

Route::get('/users', function()
{
	return View::make('users');
});
