<?php
namespace app\shop\controller;

use think\Controller;
use app\shop\validate\RoleValidate;
use app\shop\model\SpRole;
class Role extends Controller
{

    public function index(){
        return view();
    }

    public function create(){
        return view();
    }

    public function save(){
        //1
        $name = input('name');
        //2
        $objRoleValidate = new RoleValidate();
        if (!$objRoleValidate->check(['name'=>$name])){
            $this->error($objRoleValidate->getError());
        }
        //3
        $objRole = new SpRole();
        $objRole->name = $name;
        $objRole->save();

        $this->success('角色添加成功','role/index');
    }
}