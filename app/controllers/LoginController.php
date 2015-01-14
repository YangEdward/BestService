<?php

class LoginController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	private $data = array();

	public function login()
	{
		//session_start();
		//session_regenerate_id(true);
		$results = DB::select('select * from users where id = ?',array(1));
		$users = DB::table('users')->get();
		$name = $results[0]->name;

		return View::Make('home.login')->with('name', $results);
		//return View::make('welcome.index');
	}


}
