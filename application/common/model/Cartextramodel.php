<?php
/**
 * Created by PhpStorm.
 * User: 亮仔
 * Date: 2019/11/11
 * Time: 17:08
 */

namespace app\common\model;


use think\Model;

class Cartextramodel extends Model

{
    public $table = 'cart_extra';

    public function queryone($data)
    {
        return $this->where($data)->find();
    }

    //插入数据
    public function insertgoods($data)
    {
        return $this->allowField(true)->save($data);
    }

    //谁的 哪的['uid'=>'','gid'=>'']  自增
    public function goodsnumInc($where)
    {
        return $this->where($where)->setInc('num');
    }

    //查询这个分类的所有商品
    public function querygoods($uid)
    {
        return $this->field('gid,num,status')->where('uid', $uid)->select();

    }


    //减少商品的数量
    public function delectgoods($uid)
    {
        return $this->where($uid)->delete();
    }


    public function goodsnumDec($uid)
    {
        return $this->where($uid)->setDec('num');
    }


    //商品的更新

    public function updategoods($where, $value)
    {
        return $this->where($where)->update($value);
    }

    //订单选中的商品
    public function queryselectgoods($where)
    {
        return $this->field('gid,num')->where($where)->select();

    }

    //删除商品
    public function deletegoods($where)
    {
        return $this->where($where)->delete();
    }


}