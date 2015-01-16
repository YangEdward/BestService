<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 2015/1/14
 * Time: 23:25
 */

class CustomerProjectController extends BaseController{

    public function __construct()
    {
        $this->model = 'User';
        $this->fields_all = [
            'id' => [
                'show' => '序号',
            ],
            'name' => [
                'show' => '姓名',
                'search' => "name like CONCAT('%', ?, '%')"
            ],

            'email' => [
                'show' => '邮箱',
            ],
            'password' => [
                'show' => '密码',
            ],
            'tencent' => [
                'show' => 'QQ',
            ],
            'telphone' => [
                'show' => '手机号码',
            ],
            'area' => [
                'show' => '地域',
            ],
            'company' => [
                'show' => '单位名称',
            ],
            'created_at' => [
                'show' => '创建时间',
            ],
            'updated_at' => [
                'show' => '更新时间',
            ],
            'search' => [
                'type' => 'like',
                'value' => '%?%'
            ]
        ];

        $this->fields_show = ['id' ,'name', 'email', 'telphone', 'tencent'];
        $this->fields_edit = ['name','tencent', 'telphone','area','company'];
        $this->fields_create = ['name', 'email', 'password','tencent','telphone','area','company'];
        parent::__construct();
    }

    public function hirePost(){
        return View::Make('project.hire-post');
    }

    public function save(){

    }

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