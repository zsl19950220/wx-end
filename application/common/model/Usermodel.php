<?php
/**
 * Created by PhpStorm.
 * User: 亮仔
 * Date: 2019/11/7
 * Time: 14:32
 */

namespace app\common\model;


use think\Model;

class Usermodel extends Model
{
    protected $table = 'users';  //和表名一样
    protected $autoWriteTimestamp = true;

    public function insert($data)
    {
        return $this->allowField(true)->save($data);
    }

    public function queryusers($where)
    {
        return $this->where($where)->select();
    }

    public function queryone($uid)
    {
        return $this->where('id', $uid)->find();
    }


}