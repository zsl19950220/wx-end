<?php
/**
 * Created by PhpStorm.
 * User: 亮仔
 * Date: 2019/11/11
 * Time: 15:35
 */

namespace app\common\model;


use think\Model;

class Cartmodel extends Model
{
    protected $table = 'cart';

    public function queryone($uid)
    {
        return $this->where('id', $uid)->find();
    }

    public function insertcart($data)
    {
        return $this->allowField(true)->save($data);
    }

    //谁total，price
    public function cartInc($uid, $field, $value = 1)
    {
        return $this->where('id', $uid)->setInc($field, $value);

    }

    //购物车商品减少
    public function cartDec($uid, $field, $value = 1)
    {
        return $this->where('id', $uid)->setDec($field, $value);

    }

    //购物车商品的更新
    public function cartupdate($where, $value)
    {
        return $this->where($where)->update($value);
    }

    public function deleteCart($where){
        return $this->where($where)->delete();
    }


}