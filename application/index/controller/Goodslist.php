<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Goodslist extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        //查询下边列表数据
        $cate = Db::table('category')
            ->field('id,cname,thumb')
            ->order('id', 'asc')
            ->select();

        $len = count($cate);
        if ($len) {
            for ($i = 0; $i < $len; $i++) {
                $cid = $cate[$i]['id'];
                $goods = Db::table('goods')->field('gid,gthumb,gname,mprice,sprice')
                    ->where('cid', $cid)->limit(0, 3)->select();

                $cate[$i]['goods'] = $goods;
            }
        }
        if ($cate) {
            return json([
                'code' => config('code.success'),
                'msg' => '商品查询成功',
                'data' => $cate,
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '商品查询失败',

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
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $goods = Db::table('goods')->field('gid,gname,gthumb,mprice,sprice')
            ->where('cid', $id)
            ->select();

        if ($goods) {
            return json([
                'code' => config('code.success'),
                'msg' => '商品查询成功',
                'data' => $goods,
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '商品查询失败',

            ]);
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
