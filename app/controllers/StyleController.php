<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/16
 * Time: 16:17
 */

class StyleController extends BaseController{

    public function showProducts(){

        return View::Make('product.show');

    }

    public function getStylesByComponentId($componentId){
        if(Request::ajax()){
            return Style::where('components_id','=',$componentId);
        }
        return null;
    }
    /**
     * Display a listing of products
     *
     * @return Response
     */

    public function index(){

        $builder = Style::orderBy('id', 'asc');
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
        return View::make('admin.style.index', [
            'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create(){
        return View::make('admin.style.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */

    public function store(){

        $model = new Style;
        $validator = Validator::make($data = Input::all(),Style::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->create($data);
        return Redirect::to('/admin/style');

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
        $model = Style::find($id);
        return View::make('admin.style.edit', compact('model'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id){

        $model = Style::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Style::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->update($data);

        return Redirect::to('/admin/style');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id){

        Style::destroy($id);
        return Redirect::to('/admin/style');
    }
}