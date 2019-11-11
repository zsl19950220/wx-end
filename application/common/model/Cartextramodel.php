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

    public function insertgoods($data)
    {
        return $this->allowField(true)->save($data);
    }

    //谁的 哪的['uid'=>'','gid'=>'']  自增
    public function goodsnumInc($where)
    {
        return $this->where($where)->setInc('num');
    }


}