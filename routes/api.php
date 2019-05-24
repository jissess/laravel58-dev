<?php

use \Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Base', 'prefix' => 'base'], function ($api) {

    //登录
    $api->post('login', 'LoginController@login');

    //需要认证相关的
    $api->group(['middleware' => ['jwt-verify']], function ($api) {
        //退出
        $api->post('logout', 'LoginController@logout');

        //用户相关
        $api->get('my-ms', 'UsersController@myMs');
    });


});
