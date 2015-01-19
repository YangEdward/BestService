<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 10:48
 */
class FormController extends BaseController {

    // 对应的模型
    protected $model;

    // 名称
    protected $name;

    // 所有的字段
    protected $fields_all;

    // 列表页显示的字段
    protected $fields_show;

    // 编辑页面显示的字段
    protected $fields_edit;

    // 创建页面显示的字段
    protected $fields_create;

    public function __construct()
    {

        $route = Route::currentRouteAction();
        list($this->controller, $action) = explode('@', $route);
        View::share('controller', $this->controller);

        $fields_show = array();
        foreach ($this->fields_show as $field) {
            $fields_show[$field] = $this->fields_all[$field];
        }
        View::share('fields_show', $fields_show);

        $fields_edit = array();
        foreach ($this->fields_edit as $field) {
            $fields_edit[$field] = $this->fields_all[$field];
        }
        View::share('fields_edit', $fields_edit);

        $fields_create = array();
        foreach ($this->fields_create as $field) {
            $fields_create[$field] = $this->fields_all[$field];
        }
        View::share('fields_create', $fields_create);

        View::share('input', Input::all());
    }

    /**
     * Display a listing of products
     *
     * @return Response
     */

    public function index(){

        $model = new $this->model;
        $builder = $model->orderBy('id', 'desc');
        $input = Input::all();
        foreach ($input as $field => $value) {
            if (empty($value)) {
                continue;
            }
            if (!isset($this->fields_all[$field])) {
                continue;
            }
            $search = $this->fields_all[$field];
            $builder->whereRaw($search['search'], [$value]);
        }
        $models = $builder->paginate(20);
        return View::make('form.index', [
            'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create(){
        return View::make('form.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */

    public function store(){

        $model = new $this->model;
        $validator = Validator::make($data = Input::all(),$model->$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->create($data);

        return Redirect::route(action($this->controller . '@index'));

    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id){

        $model = new $this->model;
        $model = $model->findOrFail($id);
        return View::make('form.show', compact('model'));

    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id){
        $model = new $this->model;
        $model = $model->find($id);
        return View::make('form.edit', compact('model'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id){

        $model = new $this->model;
        $model = $model->findOrFail($id);

        $validator = Validator::make($data = Input::all(), $model->$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->update($data);

        return Redirect::route(action($this->controller . '@index'));
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id){

        $model = new $this->model;
        $model->destroy($id);
        return Redirect::route(action($this->controller . '@index'));
    }
}