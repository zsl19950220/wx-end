<?php
/**
 * Created by PhpStorm.
 * User: 亮仔
 * Date: 2019/11/14
 * Time: 16:28
 */

namespace app\common\model;


use think\Model;

class Ordersmodel extends Model
{
    protected $table = 'orders';

    public function insertOrders($data)
    {
        return $this->allowField(true)->save($data);
    }

    public function queryOne($where)
    {
        return $this->where($where)->find();
    }

    //更新订单
    public function updateOrders($where, $value)
    {
        return $this->where($where)->update($value);
    }

}