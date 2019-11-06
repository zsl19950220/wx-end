<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Cate extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //列表加载页面
        //刷新
        $data = $this->request->get();
        if (isset($data['limit']) && !empty($data['limit'])) {
            $limit = $data['limit'];
        } else {
            $limit = 1;
        };
        if (isset($data['page']) && !empty($data['page'])) {
            $page = $data['page'];
        } else {
            $page = 1;
        };
        $cid = $data['cid'];
        $goods = Db::table('goods')->field('gid,gname,gthumb,mprice,sprice')
            ->order('gid', 'asc')
            ->where('cid', $cid)->paginate($limit, false, [
                'page' => $page
            ]);
        $total = $goods->total();
        $goods = $goods->items();
        if ($total > 0 && count($goods)) {
            return json([
                'code' => config('code.success'),
                'msg' => '分类详情成功',
                'data' => $goods,
                'total'=>$total,
            ]);
        }else {
            return json([
                'code' => config('code.fail'),
                'msg' => '分类详情失败',

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
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //商品详情
        $goods = Db::table('goods')->where('gid', $id)->find();
        if ($goods) {
            return json([
                'code' => config('code.success'),
                'msg' => '详情查询成功',
                'data' => $goods,
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '详情查询失败',

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
