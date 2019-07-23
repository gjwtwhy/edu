<?php

namespace app\three\validate;

use think\Validate;

class Goods extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'cate_id'=>'require',
        'name'=>'require',
        'price'=>'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'cate_id.require'=>'分类必须选择',
        'name.require'=>'商品名称不能为空',
        'price.require'=>'价格不能为空'
    ];
}
