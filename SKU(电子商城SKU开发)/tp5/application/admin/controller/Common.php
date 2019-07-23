<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\facade\Session;

class Common extends Controller
{
    public function __construct()
    {
        $user = Session::get('user');
        if (!$user){
            $this->error('请登录','login/index');
        }
        //权限控制
        //1,获取来源的控制器和方法名
        $c = \request()->controller();
        $a = \request()->action();
        $pstr = strtolower($c).'/'.strtolower($a);
        if (!in_array($pstr,$user['power'])){
            $this->error('无权限登录','login/index');
        }
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
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
