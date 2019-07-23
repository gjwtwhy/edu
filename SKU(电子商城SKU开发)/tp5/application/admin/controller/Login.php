<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\MonthUser;
use think\facade\Session;
use app\admin\model\UserCheck;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return view();
    }

    public function login(){
        //1接参数
        $username = input('name');
        $pwd = input('pwd');
        //2参数验证
        if (empty($username)){
            echo json_encode(['code'=>2001,'message'=>'用户名不能为空']);
            exit;
        }
        if (empty($pwd)){
            echo json_encode(['code'=>2001,'message'=>'密码不能为空']);
            exit;
        }

        //数据库查询
        $objAdmin  = new MonthUser();
        $list = $objAdmin->login($username,$pwd);
        //返回结果
        if ($list){
            Session::set('user',$list);
            echo json_encode(['code'=>200,'message'=>'','data'=>$list]);
            exit;
        } else {
            echo json_encode(['code'=>2001,'message'=>'用户名或密码错误']);
            exit;
        }

    }

    /**
     * 注册
     */
    public function register(){
        $data = input();
        //验证数据
        $validate = new UserCheck();
        if (!$validate->check($data)){
            var_dump($validate->getError());
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
