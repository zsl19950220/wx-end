<?php

namespace app\admin\controller;

use think\Controller;
use think\Exception;
use think\Request;

class Category extends Controller
{
    protected function _initialize()
    {
        checkToken();
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        $model = model('Category');

        $result = $model->query();

        if ($result > 0) {
            return json([
                'code' => config('code.success'),
                'msg' => '分类查询成功',
                'data' => $result
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '分类查询失败',

            ]);
        }


    }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        echo 'create';
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //存储数据
        //cname thumb sort
        //权限身份验证，请求方式验证，验证发送过来的数据
        $data = $this->request->post();

        $validate = validate('Category');

        if (!$validate->scene('insert')->check($data)) {
            return json([
                'code' => config('code.fail'),
                'msg' => $validate->getError()
            ]);

        }
        $model = model('Category');
        $result = $model->insert($data);
        if ($result > 0) {
            return json([
                'code' => config('code.success'),
                'msg' => '分类添加成功'
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '分类添加失败'
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
        $model = model('Category');

        $result = $model->selectupdates($id);

        if ($result) {
            return json([
                'code' => config('code.success'),
                'msg' => '分类获取成功',
                'data' => $result
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '分类获取失败',

            ]);
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        echo 'edit';
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
        $data = $this->request->put();

        $model = model('Category');

        $result = $model->updates($data, $id);
        if ($result) {
            return json([
                'code' => config('code.success'),
                'msg' => '数据修改成功',
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '数据修改失败',

            ]);
        }

    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {

        $model = model('Category');
        $result = $model->del($id);
        if ($result > 0) {
            return json([
                'code' => 200,
                'msg' => '删除成功'
            ]);
        } else {
            return json([
                'code' => 404,
                'msg' => '删除失败'
            ]);
        }

    }
}
