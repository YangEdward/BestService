<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 2015/1/14
 * Time: 23:26
 */
use Illuminate\Database\Eloquent;

class CustomerProject extends Eloquent {

    protected $fillable = array('title', 'brief', 'user_name','email',
        'phone','finished_times');

    protected  $errors;

    protected $validator;

    // create the validation rules ------------------------
    protected static $rules = [
        'title'             => 'required', 						// just a normal required validation
        'belong'            => 'required', 	// required and must be unique in the ducks table
        'user_name'         => 'required',
        'email'             => 'required|email', 			// required and has to match the password field
        'phone'             => 'required',
        'file_path'         => 'required|unique'
    ];

    // create custom validation messages ------------------
    protected static $messages = [
        'name.required' => 'My custom message for :attribute required',
        'required' => 'The :attribute is really really really important.',
        'same' 	=> 'The :others must match.'
    ];

    public function __construct(array $attributes = array(), Validator $validator = null)
    {
        parent::__construct($attributes);
        $this->validator = $validator ?: \App::make('validator');
    }

    public function process(){
        return $this->hasMany('ProjectProcess');
    }
    /**
     * Listen for save event
     */
    protected static function boot()
    {
        parent::boot();
        static::saving(function($model)
        {
            return $model->validate();
        });
    }

    /**
     * Validates current attributes against rules
     */
    public function validate()
    {
        $v = $this->validator->make($this->attributes, static::$rules, static::$messages);
        if ($v->passes())
        {
            return true;
        }
        $this->setErrors($v->messages());
        return false;
    }

    /**
     * Set error message bag
     *
     * @var Illuminate\Support\MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }
    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * Inverse of wasSaved
     */
    public function hasErrors()
    {
        return ! empty($this->errors);
    }

}