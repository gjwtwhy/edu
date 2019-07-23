<?php
namespace app\week\controller;

use think\Controller;
use app\week\model\WeekAdmin;

class Login extends Controller
{
    public function index(){
        return view();
    }

    public function login(){
        //接收参数
        $username = input('username');
        $pwd = input('pwd');

        //参数验证
        if (empty($username)){
            echo json_encode(['code'=>2001,'msg'=>'用户名不能为空']);
            exit;
        }
        if (empty($pwd)){
            echo json_encode(['code'=>2002,'msg'=>'密码不能为空']);
            exit;
        }

        //model层调用数据查询
        $userInfo = WeekAdmin::where('username',$username)->find();
        if (!$userInfo){
            echo json_encode(['code'=>2003,'msg'=>'用户名错误']);
            exit;
        }
        if ($userInfo['pwd'] != $pwd){//加入md5加密密码
            echo json_encode(['code'=>2003,'msg'=>'密码错误']);
            exit;
        }
        echo json_encode(['code'=>200]);
    }
}