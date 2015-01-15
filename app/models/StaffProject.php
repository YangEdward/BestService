<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:08
 */
use Illuminate\Database\Eloquent;

class StaffProject extends Eloquent{

    public function myMaster(){
        return $this->belongsTo('User');
    }

    public function myCustomerProject(){
        return $this->belongsTo('CustomerProject');
    }
}