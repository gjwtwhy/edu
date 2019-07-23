<?php
namespace app\shop\controller;

use think\Controller;
use think\facade\Session;

class Common extends Controller
{
    protected $_user ;
    public function __construct()
    {
        $user = Session::get('user');
        if (!$user){
            $this->error('请登录','login/index');
        }
        $this->_user = $user;

        //获取当前的控制器和方法
        $c = request()->controller();
        $a = request()->action();
        $ca = strtolower($c).'/'.strtolower($a);

        //如果是白名单菜单，直接过
        $wight = [
            'index/index',
            'index/menu'
        ];
        if (in_array($ca,$wight)){
            return true;
        }

        //权限控制
        if (!in_array($ca, $user['power'])){
            $this->error('无权限操作','login/index');
        }
    }
}