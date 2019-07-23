<?php

namespace app\shop\validate;

use think\Validate;

class Admin extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username' => 'require|min:6',
        'pwd' => 'require|min:6'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'username.require' => '用户名不能为空',
        'username.min'=>'用户名不能小于6位',
        'pwd.require'=>'密码不能为空',
        'pwd.min'=>'密码不能小于6位'
    ];
}
