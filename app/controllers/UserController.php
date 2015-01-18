<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 10:49
 */

class UserController extends FormController{

    public function __construct()
    {
        $this->model = 'User';
        $this->fields_all = [
            'id' => [
                'show' => '序号',
            ],
            'name' => [
                'show' => '姓名',
                'search' => [
                    'type' => 'like',
                    'value' => '%?%'
                ],
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
            ]
        ];

        $this->fields_show = ['id' ,'name', 'email', 'telphone', 'tencent'];
        $this->fields_edit = ['name','tencent', 'telphone','area','company'];
        $this->fields_create = ['name', 'email', 'password','tencent','telphone','area','company'];
        parent::__construct();
    }

}