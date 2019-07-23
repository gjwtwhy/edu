<?php

namespace app\month\validate;

use think\Validate;

class ContractValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'c_no' => 'require',
        'price' => 'number|between:1,1000'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'c_no.require'=>'合同编号不能为空',
        'price.number'=>'价格必须是数字',
        'price.between'=>'价格范围必须在1到1000之间'
    ];
}
