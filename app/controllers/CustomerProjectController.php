<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 2015/1/14
 * Time: 23:25
 */

class CustomerProjectController extends BaseController{


    public function store()
    {
        $customer = new CustomerProject(Input::all());

        if ($customer->save()) {
            return Redirect::to('ducks')
                ->with('messages', '项目提交成功。谢谢您对我公司的信赖，我们会第一时间联系您!');
            //return Redirect::route('dogs.index');
        }
        return Redirect::back()->withInput()->withErrors($customer->getErrors());
    }

}