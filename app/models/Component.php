<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:21
 */

class Component extends Eloquent{

    public function myStyles(){
        return $this->hasMany('Style');
    }
}