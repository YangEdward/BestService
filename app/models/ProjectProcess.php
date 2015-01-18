<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:23
 */

class ProjectProcess extends Eloquent{

    protected $fillable = array('back_reason', 'answer');

    // Add your validation rules here
    public static $rules = [
        'users_id' => 'required',
        'customer_projects_id' => 'required',
        'handle_person' => 'required'
    ];

    public function process(){
        return $this->belongsTo('CustomerProject');
    }
}