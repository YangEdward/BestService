<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 2015/1/13
 * Time: 23:37
 */
class ProductController extends BaseController {


    public function show()
    {
        //session_start();
        //session_regenerate_id(true);
        $results = DB::select('select * from users where id = ?',array(1));
        $users = DB::table('users')->get();
        $name = $results[0]->name;

        return View::Make('product.show')->with('name', $results);
        //return View::make('welcome.index');
    }
}