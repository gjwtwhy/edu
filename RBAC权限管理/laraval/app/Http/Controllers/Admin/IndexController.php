<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Power;

class IndexController extends Controller
{
    //
    public function index(){
        //1从session内获取权限ID
        $power = session('power');
        $power_ids = $power['power_ids'];

        //2实例化power类，调用方法返回菜单数据
        $objPower = new Power();
        $list = $objPower->getMenu($power_ids);

        return view('admin',['menu'=>$list]);
    }
}
