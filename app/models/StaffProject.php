<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 11:08
 */
use Illuminate\Database\Eloquent;

class StaffProject extends Eloquent{

    // Add your validation rules here
    public static $rules = [
        'users_id' => 'required',
        'belongs_to_id' => 'required',
        'handle_times' => 'required|min:0',
    ];

    public function myMaster(){
        return $this->belongsTo('User');
    }

    public function myCustomerProject(){
        return $this->belongsTo('CustomerProject');
    }
}