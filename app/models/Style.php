<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:07
 */

class Style extends Eloquent {

    protected $fillable = array('min_api', 'price', 'title','descriptions');

    // Add your validation rules here
    public static $rules = [
        'components_id' => 'required',
        'pic_path' => 'required',
        'min_api' => 'required'
    ];

    public function component(){
        return $this->belongsTo('Component');
    }
}