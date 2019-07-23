<?php
namespace app\shop\controller;

use think\Controller;
use app\shop\validate\PowerValidate;
use app\shop\model\SpPower;
class Power extends Controller
{
    public function index(){
        return view();
    }

    public function create(){
        return view();
    }

    public function save(){
        //1
        $data = input();
        //2
        $objPowerValidate = new PowerValidate();
        if (!$objPowerValidate->check($data)){
            $this->error($objPowerValidate->getError());
        }
        //3
        $objPower = new SpPower();
        $objPower->pid = $data['pid'];
        $objPower->name = $data['name'];
        $objPower->c = strtolower($data['c']);
        $objPower->a = strtolower($data['a']);
        $objPower->ca = strtolower($data['c']).'/'.strtolower($data['a']);
        $objPower->save();

        $this->success('权限添加成功','power/index');

    }
}