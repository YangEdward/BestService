<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/16
 * Time: 16:17
 */

class StyleController extends FormController{

    public function __construct()
    {
        $this->model = 'Style';
        $this->fields_all = [
            'id' => [
                'show' => '序号',
            ],
            'components_id' => [
                'show' => '姓名',
                'type' => 'sector',
            ],
            'pic_path' => [
                'show' => '演示文件',
                'type' => 'file',
            ],
            'min_api' => [
                'show' => 'Api版本',
            ],
            'price' => [
                'show' => '报价',
            ],
            'title' => [
                'show' => '效果标题',
                'search' => [
                    'type' => 'like',
                    'value' => '%?%'
                ]
            ],
            'descriptions' => [
                'show' => '效果描述',
                'type' => 'textarea',
            ],
            'use_times' => [
                'show' => '使用次数',
            ],
            'created_at' => [
                'show' => '创建时间',
            ],
            'updated_at' => [
                'show' => '更新时间',
            ]
        ];

        $this->fields_show = ['id' ,'title','pic_path','components_id','price','min_api', 'use_times',
            'created_at'];
        $this->fields_edit = ['title','pic_path', 'components_id','price','min_api','descriptions'];
        $this->fields_create = ['title', 'pic_path', 'components_id','price','min_api','descriptions'];
        parent::__construct();
    }

    public function show(){

        return View::Make('product.show');

    }
}