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
            return Redirect::to('/admin/user');
        }

        return View::make('admin.user.login');
    }

    /**
     * Attempt to do login
     *
     */
    public function postLoginOut(){
        Auth::logout();
        return Redirect::to('/admin/user');
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
            return Redirect::to('/admin/user');
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
        $model->name = Input::get('name');
        $model->email = Input::get('email');
        $model->password = Hash::make(Input::get('password'));
        $model->telphone = Input::get('telphone');
        $model->tencent = Input::get('tencent');
        $model->area = Input::get('area');
        $model->company = Input::get('company');
        $model->save();
        Session::flash('notice', '用户添加成功！！');
        return Redirect::to('/admin/user');

    }

    /**
     * Display the specified product.
     *
     * @param  User  $user
     * @return Response
     */

    public function show($user){

        $model = User::findOrFail($user->id);
        return View::make('admin.user.show', compact('model'));

    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  User  $user
     * @return Response
     */

    public function edit($user){
        $model = User::find($user->id);
        return View::make('admin.user.edit', compact('model'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  User  $user
     * @return Response
     */

    public function update($user){

        $model = User::findOrFail($user->id);

        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $model->update($data);
        Session::flash('notice', '用户更新成功！！');
        return Redirect::to('/admin/user/');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  User  $user
     * @return Response
     */

    public function destroy($user){

        User::destroy($user->id);
        return Redirect::to('/admin/user');
    }
}