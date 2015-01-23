<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:21
 */

class Component extends Eloquent{

    protected $fillable = array('chinese_name', 'english_name', 'icon','descriptions',
        'belongs');

    protected $table = 'components';

    // Add your validation rules here
    public static $rules = [
        'chinese_name' => 'required',
        'english_name' => 'required',
        'icon' => 'required',
        'descriptions' => 'required',
        'belongs' => 'required',
    ];

    public function styles(){
        return $this->hasMany('Style','components_id');
    }
}