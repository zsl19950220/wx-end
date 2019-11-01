<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//入口文件
header("Access-Control-Allow-Origin: *");   //允许其他共享资源 解决跨域问题
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Authorization,Content-Type,RetryAfter,retry-after,Accept, token");  //允许头信息添加一些字段
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE,OPTIONS'); //允许发送的请求是多种的，



//过滤掉不是post的请求
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    exit();
}


// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
