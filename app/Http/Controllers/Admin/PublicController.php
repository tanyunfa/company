<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\User;
class PublicController extends Controller
{
	public function login()
	{
    	//展示视图
    	return view('admin.public.login');
	}

	public function check(Request $request)
	{
        $result = new User();
		var_dump($result -> createUser());
	}
}
