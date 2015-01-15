<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:23
 */

class ProjectProcess extends Eloquent{

    public function process(){
        return $this->belongsTo('CustomerProject');
    }
}