<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:07
 */

class Style extends Eloquent {

    protected $fillable = array('components_id','pic_path','min_api',
        'price', 'title','descriptions');

    public $components_name;
    // Add your validation rules here
    public static $rules = [
        'components_id' => 'required',
        'pic_path' => 'required',
        'min_api' => 'required'
    ];

    public function component(){
        return $this->belongsTo('Component');
    }

    public function myComponent(){
        return Component::find($this->id);
    }
}