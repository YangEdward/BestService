<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 2015/1/14
 * Time: 23:25
 */

class CustomerProjectController extends BaseController{

    public function hirePost(){
        return View::Make('project.hire-post');
    }

    /**
     * Display a listing of products
     *
     * @return Response
     */

    public function index(){

        $builder = CustomerProject::orderBy('id', 'asc');
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
        return View::make('admin.customer.index', [
            'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create(){
        return View::make('admin.customer.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */

    public function store(){

        $model = new CustomerProject;
        $validator = Validator::make($data = Input::all(),CustomerProject::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->create($data);
        return Redirect::back()->with('messages', '项目提交成功。谢谢您对我公司的信赖，我们会第一时间联系您!');

    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id){

        return App::abort(404);

    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id){
        $model = CustomerProject::find($id);
        return View::make('admin.customer.edit', compact('model'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id){

        $model = CustomerProject::findOrFail($id);

        $validator = Validator::make($data = Input::all(), CustomerProject::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->update($data);

        return Redirect::to('/admin/customer');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id){

        CustomerProject::destroy($id);
        return Redirect::to('/admin/customer');
    }

}