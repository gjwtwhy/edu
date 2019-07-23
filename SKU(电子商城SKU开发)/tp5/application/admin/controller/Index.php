<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\controller\Common;
use app\admin\model\MonthPower;
use think\facade\Session;

class Index extends Common
{
    public function index()
    {
       //显示左侧的树状菜单
        //从session内获取权限ID
        $session = Session::get('user');
        $pow_ids = $session['p_ids'];
        //读取权限信息
        $menus = MonthPower::where([['id','in',$pow_ids]])->order('id','asc')->select()->toArray();

        //递归处理数据
        $objPower = new MonthPower();
        $list = $objPower->getTree($menus,0);

        return view('index',['list'=>$list]);
    }
}
