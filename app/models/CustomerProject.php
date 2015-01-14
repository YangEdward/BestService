<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 2015/1/14
 * Time: 23:26
 */
use Illuminate\Database\Eloquent;

class CustomerProject extends Eloquent{

    protected $fillable = array('name', 'email', 'password');

    public function validate(){
        // create the validation rules ------------------------
        $rules = array(
            'name'             => 'required', 						// just a normal required validation
            'email'            => 'required|email|unique:ducks', 	// required and must be unique in the ducks table
            'password'         => 'required',
            'password_confirm' => 'required|same:password' 			// required and has to match the password field
        );

        // create custom validation messages ------------------
        $messages = array(
            'required' => 'The :attribute is really really really important.',
            'same' 	=> 'The :others must match.'
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules, $messages);

        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // redirect our user back with error messages
            $messages = $validator->messages();

            // also redirect them back with old inputs so they dont have to fill out the form again
            // but we wont redirect them with the password they entered

            return Redirect::to('ducks')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirm'));

        } else {
            // validation successful ---------------------------

            // our duck has passed all tests!
            // let him enter the database

            // create the data for our duck
            $project = new CustomerProject;
            $project->name = Input::get('name');
            $project->email = Input::get('email');
            $project->password = Hash::make(Input::get('password'));

            // save our duck
            $project->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('ducks')
                ->with('messages', 'Hooray!');
        }
    }
}