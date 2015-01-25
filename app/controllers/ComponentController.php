<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/16
 * Time: 16:11
 */

class ComponentController extends BaseController{

    protected $fields_search = [
        'chinese_name' => [
            'show' => '中文名称',
            'search' => [
                'type' => 'like',
                'value' => '%?%'
            ]
        ],
    ];

    public function getByBelongs($belong){
        return Component::where('belongs','=',$belong)->get();
    }

    public function getAll(){
        $android = $this->getByBelongs('Android');
        $ios = $this->getByBelongs('Ios');
        $web = $this->getByBelongs('Web');
        View::share('android', $android);
        View::share('ios', $ios);
        View::share('web', $web);
        return View::Make('product.show');
    }
    /**
     * Display a listing of products
     *
     * @return Response
     */

    public function index(){

        $builder = Component::orderBy('id', 'asc');
        $input = Input::all();
        foreach ($input as $field => $value) {
            if (empty($value)) {
                continue;
            }
            if (!isset($this->fields_search[$field])) {
                continue;
            }
            $search = $this->fields_search[$field];
            $builder->whereRaw($search['search'], [$value]);
        }
        $models = $builder->paginate(20);
        return View::make('admin.component.index', [
            'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create(){
        return View::make('admin.component.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */

    public function store(){

        $model = new Component;
        $validator = Validator::make($data = Input::all(),Component::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->create($data);
        Session::flash('notice', '类型添加成功！！');
        return Redirect::to('/admin/main-class');

    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id){

        $model = Component::findOrFail($id);
        return View::make('admin.component.show', compact('model'));

    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id){
        $model = Component::find($id);
        return View::make('admin.component.edit', compact('model'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id){

        $model = Component::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Component::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->update($data);
        Session::flash('notice', '类型更新成功！！');
        return Redirect::to('/admin/main-class');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id){

        Component::destroy($id);
        return Redirect::to('/admin/main-class');
    }
}