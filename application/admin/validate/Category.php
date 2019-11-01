<?php
/**
 * Created by PhpStorm.
 * User: 亮仔
 * Date: 2019/10/29
 * Time: 16:51
 */

namespace app\admin\validate;

use think\Validate;
class Category extends Validate
{
    protected $rule=[
      'cname'=>'require|min:2|max:5',
      'thumb'=>'require',
      'sort'=>'require|number',
    ];
    protected $message=[
        'thumb'=>'thumb字段必填',
        'cname.require'=>'cname字段必填',
        'cname.min'=>'cname最少2个字段'
    ];
    protected $scene=[
        'insert'=>['cname','thumb','sort']
    ];

}