<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
		'password' => 'required',
		'email' => 'required|email',
		'telphone' => 'required',
		'area' => 'required|max:18',
		'role' => 'required',
	];
	// Don't forget to fill this array
	protected $fillable = array('area', 'name', 'email','tencent',
		'telphone','company');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function projects(){
		return $this->hasMany('StaffProject');
	}

}
