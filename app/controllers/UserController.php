<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/15
 * Time: 10:49
 */

class UserController extends BaseController{

    /**
     * Displays the login form
     *
     */
    public function getLogin()
    {
        $user = Auth::user();
        if(!empty($user->id)){
            return Redirect::to('/admin/users');
        }

        return View::make('admin.user.login');
    }

    /**
     * Attempt to do login
     *
     */
    public function postLoginOut(){
        Auth::logout();
        return Redirect::to('/admin/users');
    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin(){
        $email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {
            return Redirect::to('/admin/users');
        }
        Session::flash('notice','邮箱或密码错误，请重新登录');
        return Redirect::back();
    }

    public function index(){

        $builder = User::orderBy('id', 'asc');
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
        return View::make('admin.user.index', [
            'models' => $models,
            'title' => "用户管理"
        ]);
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create(){
        return View::make('admin.user.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */

    public function store(){

        $model = new User;
        $validator = Validator::make($data = Input::all(),User::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->create(Input::all());
        Session::flash('notice', '用户添加成功！！');
        return Redirect::to('/admin/users');

    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id){

        $model = User::findOrFail($id);
        return View::make('admin.user.show', compact('model'));

    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id){
        $model = User::find($id);
        return View::make('admin.user.edit', compact('model'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id){

        $model = User::findOrFail($id);

        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->update($data);
        Session::flash('notice', '用户更新成功！！');
        return Redirect::to('/admin/users');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id){

        User::destroy($id);
        return Redirect::to('/admin/users');
    }
}