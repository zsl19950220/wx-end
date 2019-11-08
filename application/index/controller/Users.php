<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Users extends Controller
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
        //接收数据 用户名 密码 手机号
        $data = $this->request->post();

        //调用模型
        $model = model('Usermodel');

        $result = $model->queryusers(['tel' => $data['tel']]);
        if (count($result) > 0) {
            return json([
                'code' => config('code.fail'),
                'msg' => '该手机号已注册'
            ]);
        }

        $result = $model->queryusers(['nickname' => $data['nickname']]);
        if (count($result) > 0) {
            return json([
                'code' => config('code.fail'),
                'msg' => '该昵称已注册'
            ]);
        }


        $data['password'] = md5(crypt($data['password'], config('salt')));
        $result = $model->insert($data);
        if ($result) {
            return json([
                'code' => config('code.success'),
                'msg' => '注册成功'
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '注册失败'
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
