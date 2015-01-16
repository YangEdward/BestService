<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/16
 * Time: 16:11
 */

class ComponentController extends FormController{

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
}