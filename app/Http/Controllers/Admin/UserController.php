<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\User;
use Input;
class UserController extends Controller
{
    /**
     * 管理员列表
     */
    public function index()
    {

        $data = User::paginate(20);
        $total = User::count();
        return view('admin.user.index',compact('data','total'));
    }

    /**
     * 管理员添加页面
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * 管理员插入操作
     */
    public function store(Request $request)
    {
        $data = Input::all();
        $user = new User();
        $result = $user -> createUser($data);
        return response()->json($result);
    }


    public function show()
    {

    }

    /**
     * 管理员修改页面
     */
    public function edit($id)
    {
        return view('admin.user.edit');
    }

    /**
     * 管理员更新操作
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除管理员
     */
    public function destroy($id)
    {
        //
    }
}
