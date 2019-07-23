<?php
namespace app\shop\controller;
use app\shop\controller\Common;
use app\shop\model\SpPower;
class Index extends Common
{
    public function index()
    {
        //查询权限菜单信息
        $list = SpPower::where([['id','in',$this->_user['power_ids']],['is_show','=',1]])->select()->toArray();
        //树状处理
        $objPower = new SpPower();
        $tree = $objPower->getTreeList($list,0);
        return view('index',['list'=>$tree]);
    }
}
