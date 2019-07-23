<?php

namespace app\shop\validate;

use think\Validate;

class PowerValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'pid'=>'number',
        'name'=>'require',
        'c'=>'require',
        'a'=>'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'pid.number'=>'父ID必须是数字',
        'name.require'=>'权限名称必须填写',
        'c.require'=>'控制器必须填写',
        'a.require'=>'方法名必须填写',
    ];
}
