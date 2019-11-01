<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class Goods extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {


        //分页
        $data = $this->request->get();
        if (isset($data['page']) && !empty($data['page'])) {
            $page = $data['page'];
        } else {
            $page = 1;
        }
        if (isset($data['limit']) && !empty($data['limit'])) {
            $limit = $data['limit'];
        } else {
            $limit = 3;
        }


        //搜索
        $sarr = [];
        if(isset($data['cid'])&&!empty($data['cid'])){
            $sarr['cid'] = $data['cid'];
        };
        if(isset($data['gname'])&&!empty($data['gname'])){
            $sarr['gname'] = ['like','%'.$data['gname'].'%'];
        };
        if(isset($data['min_price'])&&!empty($data['min_price'])&&isset($data['max_price'])&&!empty($data['max_price'])){
            $sarr['sprice'] = [
                'between',[$data['min_price'],$data['max_price']]
            ];
        };


        $result = Db::table('goods')->alias('g')->join('category', 'g.cid=category.id')
            ->field('g.gid,g.gname,g.mprice,g.sprice,g.stock,g.voume,g.gthumb,g.describ,g.brand,g.norms,category.cname')
            ->where($sarr)
            ->paginate($limit, false, [
                'page' => $page
            ]);

        $count = $result->total();
        $goods = $result->items();

        if ($count>0 && count($goods)) {
            return json([
                'code' => config('code.success'),
                'msg' => '商品查询成功',
                'data' => $goods,
                'count'=>$count
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
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $this->request->post();

        $model = model('Goods');
        $result = $model->insert($data);


        if ($result > 0) {
            return json([
                'code' => config('code.success'),
                'msg' => '商品添加成功'
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '商品添加失败'
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
        $model = model('Goods');

        $result = $model->goodsupdates($id);

        if ($result) {
            return json([
                'code' => config('code.success'),
                'msg' => '商品获取成功',
                'data' => $result
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '商品获取失败',

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
        $data = $this->request->put();

        $model = model('Goods');

        $result = $model->updates($data, $id);
        if ($result) {
            return json([
                'code' => config('code.success'),
                'msg' => '商品更新成功',
            ]);
        } else {
            return json([
                'code' => config('code.fail'),
                'msg' => '商品更新失败',

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
        $model = model('Goods');
        $result = $model->del($id);
        if ($result > 0) {
            return json([
                'code' => 200,
                'msg' => '商品删除成功'
            ]);
        } else {
            return json([
                'code' => 404,
                'msg' => '商品删除失败'
            ]);
        }

    }
}
