<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/16
 * Time: 16:20
 */

class StaffProjectController extends BaseController{

    /**
     * Display a listing of products
     *
     * @return Response
     */

    public function index(){

        $builder = StaffProject::orderBy('id', 'desc');
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
        return View::make('admin.staff.index', [
            'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create(){
        return App::abort(404);
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */

    public function store(){

        $model = new StaffProject;
        $validator = Validator::make($data = Input::all(),StaffProject::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->create($data);

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
        $model = StaffProject::find($id);
        return View::make('admin.staff.edit', compact('model'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id){

        $model = StaffProject::findOrFail($id);

        $validator = Validator::make($data = Input::all(), StaffProject::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->update($data);

        return Redirect::to('/admin/staff');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id){

        StaffProject::destroy($id);
        return Redirect::to('/admin/staff');
    }
}