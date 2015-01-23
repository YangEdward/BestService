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
		return View::Make('home.login');
		//return View::make('welcome.index');
	}


}
