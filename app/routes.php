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

Route::group(array('prefix' => 'admin'), function()
{
	Route::resource('user', 'UserController');
	Route::resource('component', 'ComponentController');
	Route::resource('style', 'StyleController');
	Route::resource('customer', 'CustomerProjectController');
	Route::resource('staff', 'StaffProjectController');
	Route::resource('process', 'ProjectProcessController');
});

/* Users about*/
Route::get('/user/login', 'UserController@getLogin');
Route::post('/user/post_login', 'UserController@postLogin');
Route::get('/user/post_login_out', 'UserController@postLoginOut');

/* Component about*/
Route::get('/admin/component/{belong}', 'ComponentController@getByBelongs');


/* Style about*/
Route::get('/style/{id}', 'StyleController@getByComponentId');
/**
 * The route for the load file.
 */
Route::any('style/file_load', 'StyleController@loadFiles');
Route::any('customer/file_load', 'CustomerProjectController@loadFiles');

Route::post('/upload', function()
{
	return Plupload::receive('file', function ($file)
	{
		$file->move(storage_path() . '/test/', $file->getClientOriginalName());

		return 'ready';
	});
});

Route::get('/', 'LoginController@login');

Route::get('product/show', 'ComponentController@getAll');

Route::get('project/hire-post', 'CustomerProjectController@hirePost');

Route::get('about-us', function(){
	return View::make('about.about-us');
});

