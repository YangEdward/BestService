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
            Session::flash('notice', '项目提交失败,文件重新命名上传');
            return Redirect::back();
        }
        //$model->create(Input::all());
        $model->title = Input::get('title');
        $model->brief = Input::get('brief');
        $model->user_name = Input::get('user_name');
        $model->email = Input::get('email');
        $model->phone = Input::get('phone');
        $model->finished_times = Input::get('finished_times');
        $model->file_path = Input::get('file_path');
        $model->belong = Input::get('belong1').','.Input::get('belong2').','.Input::get('belong3');
        $model->save();
        Session::flash('notice', '项目提交成功。谢谢您对我公司的信赖，我们会第一时间联系您!');
        return Redirect::back();

    }

    public function loadFiles(){
        // We simply move the uploaded file to the target directory
        $result = Input::file('file')->move('customerFiles', Input::file('file')->getClientOriginalName());

        // Return the result of the upload
        return $this->respond(array('OK' => ($result) ? 1 : 0));
    }

    /**
     * Method returning the response.
     *
     * @param array $response The response to be returned.
     * @return string
     * @throws \InvalidArgumentException Thrown when the response is empty.
     */
    public function respond(array $response) {

        // We have to return something
        if (true === empty($response)) {
            throw new \InvalidArgumentException('No response to return.');
        }

        return \Response::json($response);
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
        $model->title = Input::get('title');
        $model->brief = Input::get('brief');
        $model->user_name = Input::get('user_name');
        $model->email = Input::get('email');
        $model->phone = Input::get('phone');
        $model->finished_times = Input::get('finished_times');
        $model->belong = Input::get('belong1').','.Input::get('belong2').','.Input::get('belong3');
        $model->update();
        Session::flash('notice', '项目更新成功。谢谢您对我公司的信赖，我们会第一时间联系您!');
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