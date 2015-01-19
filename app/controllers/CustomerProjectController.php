<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 2015/1/14
 * Time: 23:25
 */

class CustomerProjectController extends FormController{

    public function __construct()
    {
        $this->model = 'User';
        $this->fields_all = [
            'id' => [
                'show' => '序号',
            ],
            'title' => [
                'show' => '项目标题',
                'search' => [
                    'type' => 'like',
                    'value' => '%?%'
                ]
            ],
            'belong' => [
                'show' => '项目归类',
            ],
            'brief' => [
                'show' => '项目简介',
            ],
            'user_name' => [
                'show' => '项目提交人',
            ],
            'password' => [
                'show' => '密码',
            ],
            'email' => [
                'show' => '邮箱',
            ],
            'phone' => [
                'show' => '联系方式',
            ],
            'price' => [
                'show' => '报价',
            ],
            'price_time' => [
                'show' => '报价时间',
            ],
            'finished_times' => [
                'show' => '完成时间',
            ],
            'file_path' => [
                'show' => '需求文件',
            ],
            'back_times' => [
                'show' => '返工次数',
            ],
            'status' => [
                'show' => '当前状态',
            ],
            'created_at' => [
                'show' => '创建时间',
            ],
            'updated_at' => [
                'show' => '更新时间',
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