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

    public function getByComponentId($componentId){
        if(Request::ajax()){
            return Style::where('components_id','=',$componentId)->get();
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
        Session::flash('notice', '用户添加成功！！');
        return Redirect::to('/admin/style');
        /*echo "store";
        $model = new Style;
        var_dump(Input::all());
        $validator = Validator::make($data = Input::all(),Style::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->create($data);
        Session::flash('notice', '样式添加成功！！');
        $component = Component::find($model->components_id);
        $component->numbers ++;
        $component->save();
        return Redirect::to('/admin/style');*/

    }

    public function loadFiles(){
        // We simply move the uploaded file to the target directory
        $result = Input::file('file')->move('uploads', Input::file('file')->getClientOriginalName());

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
        Session::flash('notice', '类型更新成功！！');
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