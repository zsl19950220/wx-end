<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
Route::resource('api/category','admin/category');  //定义路由  后台
Route::resource('api/upload','admin/upload');
Route::resource('api/goods','admin/goods');



//前台
Route::resource('api/index','index/index'); //首页
Route::resource('api/cate','index/cate'); //分类
Route::resource('api/catelist','index/catelist'); //分类列表 次列表
Route::resource('api/goodslist','index/goodslist'); //分类列表 主列表
Route::resource('api/users','index/users');  //用户注册
Route::resource('api/login','index/login');  //用户登录

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
