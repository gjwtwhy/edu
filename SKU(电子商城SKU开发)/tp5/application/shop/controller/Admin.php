<?php
namespace app\shop\controller;

use think\Controller;
use app\shop\validate\Admin as AdminValidate;
use app\shop\model\SpAdmin;

class Admin extends Controller
{

    public function index(){
        return view();
    }

    public function create(){
        return view();
    }

    public function save(){
        //1，接参数
        $username = input('username');
        $pwd = input('pwd');
        //2,参数验证
        $data = [
            'username' => $username,
            'pwd' => $pwd
        ];
        $objAdminValidate = new AdminValidate();
        if (!$objAdminValidate->check($data)){
            $this->error($objAdminValidate->getError());
        }

        //3保存
        $objAdmin = new SpAdmin();
        $objAdmin->username = $username;
        $objAdmin->pwd = $pwd;
        $objAdmin->save();

        $this->success('用户添加成功','admin/index');
    }
}