<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:07
 */

class Style extends Eloquent {

    public function component(){
        return $this->belongsTo('Component');
    }
}