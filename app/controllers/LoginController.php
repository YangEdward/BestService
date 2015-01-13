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
		session_start();
		echo 'Session id:'.session_id().'</br>';
		echo 'Session id Length:'.strlen(session_id()).'</br>';
		session_regenerate_id(true);
		$results = DB::select('select * from users where id = ?',array(1));
		$users = DB::table('users')->get();
		$name = $results[0]->name;

		return View::Make('layout.login')->with('name', $results);
		//return View::make('welcome.index');
	}


}
