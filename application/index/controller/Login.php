<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\JWT;
use think\Request;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //接收数据  用户名 密码
        $data = $this->request->post();
        $username = $data['nickname'];
        $password = md5(crypt($data['password'], config('salt')));
        $arr = [
            'nickname' => $username,
            'password' => $password
        ];
        $arr1 = [
            'tel' => $username,
            'password' => $password
        ];

        $result = Db::table('users')->where('nickname|tel', $username)->where('password', $password)->find();

        //验证登录


        if ($result) {

            $token = JWT::getToken([
                'id' => $result['id'],
                'nickname' => $result['nickname']
            ], config('jwtkey'));

            return json([
                'code' => config('code.success'),
                'msg' => '登录成功',
                'token' => $token,
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '登录失败'
            ]);
        }

    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
