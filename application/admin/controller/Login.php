<?php
/**
 * Created by PhpStorm.
 * User: 亮仔
 * Date: 2019/10/29
 * Time: 10:56
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;

use think\JWT;

class Login extends Controller
{
    public function index()
    {


        $data = $this->request->post();  //接收数据

        $salt = config('salt');
        $password = $data['password'];

        $data['password'] = md5(crypt($password, md5($salt)));
        var_dump($data['password']);
        $result = Db::table('manage')->where($data)->find();

        if ($result) {

            $payload = ['id' => $result['id'], 'names' => $result['names']];
            $token = JWT::getToken($payload, config('jwtkey'));
            return json([
                'code' => 200,
                'msg' => '登录成功',
                'data' => [
                    'token' => $token,
                    'names' => $result['names']

                ]
            ]);
        } else {
            return json([
                'code' => 404,
                'msg' => '登录失败'
            ]);

        }


    }
}