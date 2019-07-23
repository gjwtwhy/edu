<?php
namespace app\shop\controller;

use think\Controller;
use app\shop\validate\Admin;
use app\shop\model\SpAdmin;
use think\facade\Session;

class Login extends Controller
{

    public function index(){
        return view();
    }

    public function login(){
        //1
        $data = input();
        //2
        $objAdminValidate = new Admin();
        if (!$objAdminValidate->check($data)){
            $this->error($objAdminValidate->getError());
        }
        //3
        $objAdmin = new SpAdmin();
        $list = $objAdmin->login($data['username'],$data['pwd']);
        if (!$list){
            $this->error('登录失败');
        }

        Session::set('user',$list);
        $this->success('登录成功','index/index');
    }


    public function logout(){
        Session::delete('user');
        $this->redirect('index/index');
    }
}