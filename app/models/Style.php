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
        //'components_id' => 'required',
        //'pic_path' => 'required|unique',
        //'min_api' => 'required'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'styles';

    public function component(){
        return $this->belongsTo('Component','components_id');
    }

    public function chineseName(){
        return '<i class="fa '.$this->component->icon.'"></i> '.$this->component->chinese_name;
    }
}