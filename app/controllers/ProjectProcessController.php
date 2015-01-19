<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/16
 * Time: 16:13
 */

class ProjectProcessController extends FormController{

    public function __construct()
    {
        $this->model = 'User';
        $this->fields_all = [
            'id' => [
                'show' => '序号',
            ],
            'users_id' => [
                'show' => '姓名',
                'search' => "name like CONCAT('%', ?, '%')"
            ],
            'customer_projects_id' => [
                'show' => '邮箱',
            ],
            'last_id' => [
                'show' => '密码',
            ],
            'finish_time' => [
                'show' => 'QQ',
            ],
            'status' => [
                'show' => '手机号码',
            ],
            'handle_person' => [
                'show' => '地域',
            ],
            'back_reason' => [
                'show' => '单位名称',
            ],
            'answer' => [
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