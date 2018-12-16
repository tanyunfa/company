<?php

Route::group(['prefix' => 'admin'], function () {
	//后台登录页面
	Route::get('public/login','Admin\PublicController@login') -> name('login');
    Route::post('public/check','Admin\PublicController@check');
    Route::get('index/index','Admin\IndexController@index');

    Route::resource('user','Admin\UserController');
});

